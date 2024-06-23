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
                <form method="POST" enctype="multipart/form-data" action="{{ route('tags.update', $tag->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="text-xl text-gray-600">Name <span class="text-red-500">*</span></label></br>
                        <input type="text" class="border-2 border-gray-300 p-2 w-full" name="name" id="name" value="{{ old('name', $tag->name) }}" required>
                    </div>
                    
                    <div class="flex p-1">
                        <button role="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400 tw-rounded-lg" required>Submit</button>
                    </div>
                </form>     
            </div>
        </div>
    </div>

@endsection