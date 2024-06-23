<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Media;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AuthorController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $authorId = $user->id;

        // Menghitung jumlah artikel milik penulis hari ini
        $today = Carbon::today();
        $articlesToday = Article::where('author_id', $authorId)
            ->where('status', '!=', 'deleted')
            ->count();

        // Menghitung jumlah artikel milik penulis kemarin
        $yesterday = Carbon::yesterday();
        $articlesYesterday = Article::where('author_id', $authorId)
            ->where('created_at', '>=', $yesterday)
            ->where('created_at', '<', $today)
            ->where('status', '!=', 'deleted')
            ->count();

        // Menghitung persentase kenaikan artikel
        $articlePercentageIncrease = 0;
        if ($articlesYesterday > 0) {
            $articlePercentageIncrease = (($articlesToday - $articlesYesterday) / $articlesYesterday) * 100;
        } else {
            $articlePercentageIncrease = $articlesToday > 0 ? 100 : 0;
        }
        return view('author.dashboard', compact('articlesToday', 'articlePercentageIncrease'));
    }
    public function viewAddArticle()
    {
        $categories = Category::select('id', 'name')->get();
        return view('author.article.add_article', compact('categories'));
    }
    public function viewArticle()
    {
        return view('author.article.index');
    }
    public function getData()
    {
        $user = Auth::user(); // Mengambil informasi pengguna yang sedang login

        // Query untuk mengambil artikel berdasarkan peran pengguna
        $articlesQuery = Article::select(['id', 'title', 'content', 'status', 'author_id'])
            ->with('author:id,full_name')->where('author_id', $user->id)->where('status', '!=', 'deleted');

        // Ambil data artikel
        $articles = $articlesQuery->get();
        return response()->json(['data' => $articles]);
    }
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'slug' => 'nullable|string|max:255',
                'my-content' => 'required|string',
                'category' => 'required|exists:categories,id',
                'action' => 'required|in:svb,svd',
                'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]);

            $article = new Article();
            $article->title = $validatedData['title'];
            $article->slug = str::slug($validatedData['title']);
            $article->content = $validatedData['my-content'];
            $article->category_id = $validatedData['category'];
            $article->status = $validatedData['action'] === 'svb' ? 'published' : 'draft';
            $article->author_id = auth()->id();
            $article->published_at = $validatedData['action'] === 'svb' ? now() : null;
            $article->save();

            if ($request->hasFile('thumbnail')) {
                $thumbnail = $request->file('thumbnail');
                $uniqueName = time() . '_' . uniqid() . '.' . $thumbnail->getClientOriginalExtension();
                $path = $thumbnail->storeAs('public/thumbnails', $uniqueName);

                if ($path) {
                    $media = new Media();
                    $media->file_name = $uniqueName;
                    $media->file_path = 'storage/thumbnails/' . $uniqueName;
                    $media->uploaded_by = auth()->id();
                    $media->uploaded_at = now();
                    $media->save();

                    // Update artikel dengan ID dari media yang baru diunggah
                    $article->thumbnail_id = $media->id;
                    $article->save();
                } else {
                    throw new \Exception('File upload failed.');
                }
            }

            DB::commit();

            return redirect()->back()->with('success', 'Article created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while creating the article.');
        }
    }

    public function edit($id)
    {
        $userId = Auth::id();
        $article = Article::with('tags')->where('id', $id)->where('author_id', $userId)->firstOrFail();
        $categories = Category::select('id', 'name')->get();
        $media = Media::find($article->thumbnail_id);
        $tags = Tag::select('id', 'name')->get();
        return view('author.article.edit', compact('article', 'categories', 'media', 'tags'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'my-content' => 'required|string',
            'category' => 'required|exists:categories,id',
            'action' => 'required|in:svb,svd',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'tags.*' => 'required|exists:tags,id',
        ]);

        DB::beginTransaction();

        try {
            $article = Article::findOrFail($id);

            // Memastikan artikel dimiliki oleh pengguna yang sedang login
            if ($article->author_id != Auth::id()) {
                return redirect()->back()->with('error', 'You are not authorized to update this article.');
            }

            $article->title = $validatedData['title'];

            if (empty($validatedData['slug'])) {
                $article->slug = Str::slug($validatedData['title']);
            } else {
                $article->slug = $validatedData['slug'];
            }
            $article->title = $validatedData['title'];
            $article->content = $validatedData['my-content'];
            $article->category_id = $validatedData['category'];
            $article->status = $validatedData['action'] === 'svb' ? 'published' : 'draft';

            $tagIds = $request->input('tags', []); // This should be an array of custom tag IDs
            $tagIds = Tag::whereIn('id', $tagIds)->pluck('id')->toArray(); // Convert custom IDs to actual IDs
            $article->tags()->sync($tagIds);

            if ($request->hasFile('thumbnail')) {
                $thumbnail = $request->file('thumbnail');
                $uniqueName = time() . '_' . uniqid() . '.' . $thumbnail->getClientOriginalExtension();
                $path = $thumbnail->storeAs('public/thumbnails', $uniqueName);

                if ($path) {
                    $media = new Media();
                    $media->file_name = $uniqueName;
                    $media->file_path = 'storage/thumbnails/' . $uniqueName;
                    $media->uploaded_by = auth()->id();
                    $media->uploaded_at = now();
                    $media->save();

                    // Update article with new thumbnail ID
                    $article->thumbnail_id = $media->id;
                } else {
                    throw new \Exception('File upload failed.');
                }
            }

            $article->save();
            DB::commit();

            return redirect()->route('author.view.article')->with('success', 'Article updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while updating the article.');
        }
    }
    public function delete($id)
    {
        DB::beginTransaction();

        try {
            $article = Article::findOrFail($id);

            // Memastikan artikel dimiliki oleh pengguna yang sedang login
            if ($article->author_id != Auth::id()) {
                return redirect()->back()->with('error', 'You are not authorized to delete this article.');
            }

            $article->status = "deleted";
            $article->save();
            DB::commit();

            return redirect()->route('author.view.article')->with('success', 'Article Deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while deleting the article.');
        }
    }
}
