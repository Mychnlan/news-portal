<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $categories = Category::select('name')->get();
        return view('guest.pages.index', compact('categories'));
    }
    public function page_slug($slug)
    {
        return view('guest.pages.slug');
    }
    public function getArticleBySlug($slug)
    {
        // Fetch the article with related media based on slug
        $article = Article::where('slug', $slug)
            ->where('status', 'published')
            ->whereHas('author', function ($query) {
                $query->where('role', '!=', 'deleted');
            })
            ->with(['media', 'author:id,full_name'])
            ->first();

        // Check if article exists
        if (!$article) {
            return response()->json(['error' => 'Article not found'], 404);
        }

        $article->time_since_published = $this->calculateTimeSincePublished($article->updated_at);

        // Return article data
        return response()->json($article);
    }
    private function calculateTimeSincePublished($createdAt)
    {
        if (is_null($createdAt)) {
            return 'invalid';
        }

        $now = Carbon::now();
        $created = Carbon::parse($createdAt);

        // Perbedaan waktu dalam menit
        $diffInMinutes = $created->diffInMinutes($now);

        if ($created->diffInDays($now) >= 7) {
            return $created->format('Y-m-d');
        }

        if ($created->diffInHours($now) >= 24) {
            return $created->diffInDays($now) . ' day ago';
        }

        // Jika perbedaan dalam jam kurang dari 24 jam, tampilkan berapa menit yang lalu
        if ($diffInMinutes < 60) {
            return $diffInMinutes . ' minute ago';
        }

        return $created->diffInHours($now) . ' hour ago';
    }

    public function getOtherArticles($slug)
    {
        // Fetch the current article
        $currentArticle = Article::where('slug', $slug)->whereHas('author', function ($query) {
            $query->where('role', '!=', 'deleted');
        })->first();

        // Check if the current article exists
        if (!$currentArticle) {
            return response()->json(['error' => 'Article not found'], 404);
        }

        // Get the tags of the current article
        $tagIds = $currentArticle->tags()->pluck('tags.id')->toArray();

        // Fetch other articles with the same tags, except the current one
        $articles = Article::where('slug', '!=', $slug)
            ->where('status', 'published')
            ->whereHas('tags', function ($query) use ($tagIds) {
                $query->whereIn('tags.id', $tagIds);
            })
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return response()->json($articles);
    }

    public function all()
    {
        $data = Article::with(['media', 'tags:name'])->where('status', 'published')->get();

        return response()->json($data);
    }
    public function show($category)
    {
        if ($category === 'All') {
            // Fetch all published articles if category is 'All'
            $data = Article::with(['media', 'tags:name'])->where('status', 'published')->get();
        } else {
            // Fetch category with related articles and media
            $category = Category::where('name', $category)
                ->with(['articles' => function ($query) {
                    $query->where('status', 'published')->with('media');
                }])
                ->first();
            // Check if category exists
            if (!$category) {
                return response()->json(['error' => 'Category not found'], 404);
            }

            // Get related articles
            $data = $category->articles;
        }

        // Return articles as JSON
        return response()->json($data);
    }
}
