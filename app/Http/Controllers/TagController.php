<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\support\Str;

class TagController extends Controller
{
    public function index()
    {
        return view('admin.tag.index');
    }
    public function getData()
    {
        $tags = Tag::select(['id', 'name', 'created_at'])->get();
        return response()->json(['data' => $tags]);
    }
    public function generateUniqueCode()
    {
        do {
            $code = 'TG-' . rand(1000000, 9999999);
            // $code = random_int(10000000, 99999999);
        } while (Tag::where("id", "=", $code)->exists());

        return $code;
    }
    public function store(Request $request)
    {
        $id = $this->generateUniqueCode();
        $validatedData = $request->validate([
            'tag' => 'required|string|max:255',
        ]);
        $slug = str::slug($request->tag);

        $tag = Tag::create([
            'id' => $id,
            'name' => $request->tag,
            'slug' => $slug
        ]);
        // Kembalikan respon atau redirect
        return redirect()->route('tags')->with('success', 'Tag created successfully.');
    }
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('admin.tag.edit', compact('tag'));
    }

    // Metode untuk menangani pembaruan data
    public function update(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);

        // Validasi data
        $validatedData = $request->validate([
            'name' => 'required|string|max:50',
        ]);

        $slug = str::slug($request->name);
        // Update kategori
        $tag->name = $validatedData['name'];
        $tag->slug = $slug;
        $tag->save();

        return redirect()->route('tags')->with('success', 'Tag updated successfully.');
    }
    public function delete()
    {
    }
}
