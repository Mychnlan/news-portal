@extends('layout.main')
@section('content')
<style>
    .custom-scrollbar {
    overflow-x: scroll;
    -ms-overflow-style: none;  /* IE and Edge */
    scrollbar-width: none;  /* Firefox */
  }
  .custom-scrollbar::-webkit-scrollbar {
    display: none;  /* Chrome, Safari, and Opera */
  }
</style>
<div class="container w-full px-6 py-6 mx-auto">
    <div class="bg-white shadow-md rounded-lg p-6">
        <a href="/add-article" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Add <i class="fa-solid fa-plus"></i></a>
    </div>
</div>
<div class="container w-full px-6 py-6 mx-auto">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-lg font-semibold mb-4">My Article</h2>

        <div class="max-h-40 overflow-x-auto">
            <table id="article-table" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Status</th>            
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script>
     $(document).ready(function() {
        $('#article-table').DataTable({
            scrollX: true,
            scrollY: 200,
            processing: true,
                ajax: {
                    url: '{!! route('article.author') !!}',
                    type: 'GET'
                },
                columns: [
                    { data: 'title', name: 'title' },
                    { data: 'status', name: 'status'},
                    {
                        data: null,
                        render: function (data, type, row) {
                            return '<a href="/article/' + data.id + '/edit" class="tw-bg-blue-500 hover:tw-bg-blue-600 tw-text-white tw-font-bold tw-py-2 tw-px-4 tw-rounded"> <i class="fa-solid fa-pen-to-square"></i></a> ' +
                                '<button type="button" class="tw-bg-red-500 hover:tw-bg-red-600 tw-text-white tw-font-bold tw-py-2 tw-px-4 tw-rounded" onclick="handleDelete(this)" data-id="' + data.id + '" data-action="article-author"><i class="fa-solid fa-trash"></i></button>';
                        }
                    }
                ]
        });
    });
</script>

@endsection