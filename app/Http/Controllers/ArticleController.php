<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $categories = Category::select('id', 'name')->get();
        return view('admin.menu.add_article', compact('categories'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:50',
            'my-content' => 'required|string',
            'category' => 'required|exists:categories,id', // Validasi untuk select category
            'action' => 'required|in:svb, svd',
        ]);
        $article = new Article();
        $article->title = $validatedData['title'];
        $article->slug = $validatedData['slug'];
        $article->content = $validatedData['my-content'];
        $article->category_id = $validatedData['category']; // Menyimpan category id
        $article->status = $validatedData['action'] === 'svb' ? 'published' : 'draft'; // Memeriksa nilai action
        $article->author_id = auth()->id(); // Contoh untuk mengambil ID penulis yang sedang login
        $article->published_at = $validatedData['action'] === 'svb' ? now() : null; // Memeriksa nilai action
        $article->save();

        return redirect()->back()->with('success', 'Article created successfully.');
    }
}
