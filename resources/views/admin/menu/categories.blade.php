@extends('layout.main')
@section('content')
<div class="container w-full px-6 py-6 mx-auto tw-dark:bg-gray-800">
    <div class="bg-white shadow-md rounded-lg p-6" >
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
                <label class="block text-2xl text-gray-700 text-sm font-bold mb-2">
                    Category Name
                  </label>
                  <input class="shadow appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 leading-tight  focus:shadow-outline" name="name" type="text" placeholder="Category Name" required>
                  <label class="block text-2xl text-gray-700 text-sm font-bold mb-2 mt-2">
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
            <table id="category-table" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
       $('#category-table').DataTable({
           scrollX: true,
           scrollY: 200,
           processing: true,
               ajax: {
                   url: '{!! route('category.data') !!}',
                   type: 'GET'
               },
               columns: [
                   { data: 'name', name: 'name' },
                   { data: 'description', name: 'description'},
                   {
                       data: null,
                       render: function (data, type, row) {
                           return '<a href="/admin/data/' + data.id + '/edit" class="tw-bg-blue-500 hover:tw-bg-blue-600 tw-text-white tw-font-bold tw-py-2 tw-px-4 tw-rounded"> <i class="fa-solid fa-pen-to-square"></i></a> ' +
                               '<button type="button" class="tw-bg-red-500 hover:tw-bg-red-600 tw-text-white tw-font-bold tw-py-2 tw-px-4 tw-rounded" onclick="handleDelete(this)" data-id="' + data.id + '" data-action="article"><i class="fa-solid fa-trash"></i></button>';
                       }
                   }
               ]
       });
   });
</script>

@endsection