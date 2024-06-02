<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home()
    {
        return view('admin.dashboard');
    }
    public function viewcategories()
    {
        // Misalnya, Anda memiliki data kategori dari model Category
        $categories = Category::all();

        // Melewatkan data kategori ke view 'admin.action.categories'
        return view('admin.menu.categories', compact('categories'));
    }
    public function viewarticle()
    {
        $article = Article::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.menu.article', compact('article'));
    }
}
