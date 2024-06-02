@extends('layout.main')
@section('content')
<div class="container w-full px-6 py-6 mx-auto">
    <div class="bg-white shadow-md rounded-lg p-6">
        <a href="/admin/add-article" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Add <i class="fa-solid fa-plus"></i></a>
    </div>
</div>
<div class="container w-full px-6 py-6 mx-auto">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-lg font-semibold mb-4">Daftar Article</h2>

        <div class="max-h-40 overflow-x-auto">
            <table class="w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Content</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($article as $art)
                        <tr class="bg-gray-50">
                            <td class="border px-4 py-2">{{ $art->id }}</td>
                            <td class="border px-4 py-2">{{ $art->title }}</td>
                            <td class="border px-4 py-2">{{ $art->status }}</td>
                            <td class="border px-4 py-2"  style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                <div class="" style="-webkit-line-clamp: 2; overflow: auto; display: -webkit-box; -webkit-box-orient: vertical;">
                                    {{ $art->content }}
                                </div>
                            </td>
                            <td class="border px-4 py-2">
                                <div class="flex">
                                    <a href="{{ route('category.edit', $art->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="{{ route('category.delete', $art->id) }}" class="text-white font-bold py-2 px-4 border border-red-700 rounded" style="background-color: rgb(239 68 68);" id="deleteButton"><i class="fa-solid fa-trash"></i></a>
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