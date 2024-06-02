<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'description' => 'nullable|string',
        ]);

        // Membuat slug dari nama kategori
        $slug = \Illuminate\Support\Str::slug($request->name);

        // Simpan data kategori ke database
        $category = Category::create([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
        ]);

        // Kembalikan respon atau redirect
        return redirect()->route('category')->with('success', 'Category created successfully.');
    }
}
