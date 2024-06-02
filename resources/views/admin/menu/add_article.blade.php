@extends('layout.main')
@section('content')
<div class="container w-full px-6 py-6 mx-auto">
    <div class="bg-white shadow-md rounded-lg p-6" >
        <div class="p-6 bg-white border-b border-gray-200">
            <form method="POST" action="{{ route('articles.store') }}">
                @csrf
                <div class="mb-4">
                    <label class="text-xl text-gray-600">Title <span class="text-red-500">*</span></label></br>
                    <input type="text" class="border-2 border-gray-300 p-2 w-full" name="title" id="title" value="" required>
                </div>

                <div class="mb-4">
                    <label class="text-xl text-gray-600">Slug</label></br>
                    <input type="text" class="border-2 border-gray-300 p-2 w-full" name="slug" id="slug" placeholder="(Optional)">
                </div>

                <div class="mb-4">
                    <label class="text-xl text-gray-600">Category <span class="text-red-500">*</span></label></br>
                    <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a Category</option>
                        @foreach ($categories as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                      </select>
                </div>
                <div class="mb-8">
                    <label class="text-xl text-gray-600">Content <span class="text-red-500">*</span></label></br>
                    <textarea name="my-content" class="border-2 border-gray-500">
                        
                    </textarea>
                </div>
                
                <div class="flex p-1">
                    <select class="border-2 border-gray-300 border-r p-2" name="action">
                        <option value="svb">Save and Publish</option>
                        <option value="svd">Save Draft</option>
                    </select>
                    <button role="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400" required>Submit</button>
                </div>
            </form>              
                 
        </div>                 
    </div>
</div>


@endsection