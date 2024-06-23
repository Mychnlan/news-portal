@extends('layout.main')
@section('content')

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container w-full px-6 py-6 mx-auto">
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                <form method="POST" enctype="multipart/form-data" action="{{ route('category.update', $category->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="text-xl text-gray-600 dark:text-gray-300">Name <span class="text-red-500">*</span></label><br>
                        <input type="text" class="border-2 border-gray-300 dark:border-gray-600 p-2 w-full" name="name" id="name" value="{{ old('name', $category->name) }}" required>
                    </div>
    
                    <div class="mb-4">
                        <label class="text-xl text-gray-600 dark:text-gray-300">Slug<span class="text-red-500">*</span></label><br>
                        <input type="text" class="border-2 border-gray-300 dark:border-gray-600 p-2 w-full" name="slug" id="slug" value="{{ old('name', $category->slug) }}">
                    </div>
                    
                    <div class="mb-8">
                        <label class="text-xl text-gray-600 dark:text-gray-300">Description <span class="text-red-500">*</span></label><br>
                        <textarea name="my-description" class="border-2 border-gray-500 dark:border-gray-600 w-full p-2">{{ old('name', $category->description) }}</textarea>
                    </div>
    
                    <div class="flex p-1">
                        <button type="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400 dark:bg-blue-800 dark:text-gray-300 dark:hover:bg-blue-700 tw-rounded-lg" required>Submit</button>
                    </div>
                </form>     
            </div>
        </div>
    </div>
    

@endsection