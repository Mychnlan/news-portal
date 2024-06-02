@extends('layout.main')
@section('content')
<div class="container w-full px-6 py-6 mx-auto">
    <div class="bg-white shadow-md rounded-lg p-6" >
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
                <label class="block text-2xl text-gray-700 text-sm font-bold mb-2" for="cname">
                    Category Name
                  </label>
                  <input class="shadow appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 leading-tight  focus:shadow-outline" name="name" type="text" placeholder="Category Name" required>
                  <label class="block text-2xl text-gray-700 text-sm font-bold mb-2 mt-2" for="slug">
                    Description
                  </label>
                <textarea required id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                <button type="submit" class="mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Submit
                </button> 
        </form>
    </div>
</div>
<div class="container w-full px-6 py-6 mx-auto">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-lg font-semibold mb-4">Daftar Kategori</h2>

        <div class="max-h-40 overflow-auto">
            <table class="w-full border-collapse border border-gray-200">
                <thead class="bg-slate-500 text-white">
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Category Name</th>
                        <th class="px-4 py-2">Description</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr class="bg-gray-50">
                            <td class="border px-4 py-2">{{ $category->id }}</td>
                            <td class="border px-4 py-2">{{ $category->name }}</td>
                            <td class="border px-4 py-2">{{ $category->description }}</td>
                            <td class="border px-4 py-2">
                                <div class="flex">
                                    <a href="{{ route('category.edit', $category->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                                    <a href="{{ route('category.delete', $category->id) }}" class="text-white font-bold py-2 px-4 border border-red-700 rounded" style="background-color: rgb(239 68 68);" id="deleteButton"><i class="fa-solid fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection