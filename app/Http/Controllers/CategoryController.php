<?php

namespace App\Http\Controllers;

use App\Models\Article;
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
    public function getData()
    {
        $category = Category::select(['id', 'name', 'description'])->get();
        // $val = $this->generateUniqueCode();
        return response()->json(['data' => $category]);
    }

    // Metode untuk menampilkan formulir edit
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    // Metode untuk menangani pembaruan data
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        // Validasi data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'my-description' => 'required',
        ]);

        // Update kategori
        $category->name = $validatedData['name'];
        $category->slug = $validatedData['slug'];
        $category->description = $validatedData['my-description'];
        $category->save();

        return redirect()->route('category')->with('success', 'Category updated successfully.');
    }
}
