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
        <div class="bg-white shadow-md rounded-lg p-6" >
            <div class="p-6 bg-white border-b border-gray-200">
                <form method="POST" enctype="multipart/form-data" action="{{ route('author.update.article', $article->id) }}">
                    @csrf
                    @method('put')
                    <div class="mb-4">
                        <label class="text-xl text-gray-600">Title <span class="text-red-500">*</span></label></br>
                        <input type="text" class="border-2 border-gray-300 p-2 w-full" name="title" id="title" value="{{$article->title}}" required>
                    </div>
    
                    <div class="mb-4">
                        <label class="text-xl text-gray-600">Slug</label></br>
                        <input type="text" class="border-2 border-gray-300 p-2 w-full" name="slug" id="slug" value="{{$article->title}}">
                    </div>
    
                    <div class="mb-4">                   
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Thumbnail</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="thumbnail" name="thumbnail" type="file">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                    @if($media)
                    <img src="{{ asset($media->file_path) }}" alt="Current Thumbnail" style="max-width: 150px;">
                    <p>{{ $media->file_name }}</p>
                    @endif
                    </div>
    
                    <div class="mb-4">
                        <label class="text-xl text-gray-600">Category <span class="text-red-500">*</span></label></br>
                        <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Choose a Category</option>
                            @foreach ($categories as $item)
                                <option value="{{$item->id}}" {{ old('category', $item->id) == $article->category_id ? 'selected' : '' }}>{{$item->name}}</option>
                            @endforeach
                          </select>
                    </div>
                    <div class="mb-4">
                        <label class="text-xl text-gray-600">Tag <span class="text-red-500">*</span></label></br>
                        @foreach($tags as $tag)
                            <div class="form-check">
                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="form-check-input"
                                    id="tag{{ $tag->id }}" {{ $article->tags->contains($tag->id) ? 'checked' : '' }}>
                                <label for="tag{{ $tag->id }}" class="form-check-label">{{ $tag->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    <div class="mb-8">
                        <label class="text-xl text-gray-600">Content <span class="text-red-500">*</span></label></br>
                        <textarea name="my-content" id="my-content" class="border-2 border-gray-500">{{$article->content}}</textarea>
                    </div>
                    
                    <div class="flex p-1">
                        <select class="border-2 border-gray-300 border-r p-2" name="action">
                            <option value="svb" {{ old('action', $article->status) == 'published' ? 'selected' : '' }}>Save and Publish</option>
                            <option value="svd" {{ old('action', $article->status) == 'draft' ? 'selected' : '' }}>Save Draft</option>
                        </select>
                        <button role="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400" required>Submit</button>
                    </div>
                </form>              
                     
            </div>                 
        </div>
    </div>

@endsection