@extends('layout.main')
@section('content')
<div class="container w-full px-6 py-6 mx-auto">
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-700 dark:border-gray-600">
            <form method="POST" enctype="multipart/form-data" action="{{ route('articles.store') }}">
                @csrf
                <div class="mb-4">
                    <label class="text-xl text-gray-600 dark:text-gray-300">Title <span class="text-red-500">*</span></label><br>
                    <input type="text" class="border-2 border-gray-300 dark:border-gray-600 p-2 w-full rounded-lg" name="title" id="title" value="" required>
                </div>

                <div class="mb-4">
                    <label class="text-xl text-gray-600 dark:text-gray-300">Slug</label><br>
                    <input type="text" class="border-2 border-gray-300 dark:border-gray-600 p-2 w-full rounded-lg" name="slug" id="slug" placeholder="(Optional)">
                </div>

                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="thumbnail">Upload file</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="thumbnail" name="thumbnail" type="file" aria-describedby="file_input_help">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                </div>

                <div class="mb-4">
                    <label class="text-xl text-gray-600 dark:text-gray-300">Category <span class="text-red-500">*</span></label><br>
                    <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a Category</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-8">
                    <label class="text-xl text-gray-600 dark:text-gray-300">Content <span class="text-red-500">*</span></label><br>
                    <textarea name="my-content" id="my-content" class="border-2 border-gray-500 p-2 w-full rounded-lg"></textarea>
                </div>

                <div class="flex items-center mb-4">
                    <select class="border-2 border-gray-300 p-2 dark:border-gray-600 dark:text-gray-300 dark:bg-gray-700 rounded-l-lg" name="action">
                        <option value="svb">Save and Publish</option>
                        <option value="svd">Save Draft</option>
                    </select>
                    <button type="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400 dark:bg-blue-800 dark:text-gray-300 dark:hover:bg-blue-700 rounded-r-lg">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection