@extends('layout.main')
@section('content')
<div class="container w-full px-6 py-6 mx-auto">
    <div class="bg-white shadow-md rounded-lg p-6 dark:bg-slate-850" >
        <form action="{{ route('tags.store') }}" method="POST">
            @csrf
                <label class="block text-2xl text-gray-700 text-sm font-bold mb-2" for="tags">
                    Tag Name
                </label>
                <input class="shadow appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 leading-tight  focus:shadow-outline" name="tag" type="text" placeholder="Tag Name" required>
                <button type="submit" class="mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Submit
                </button> 
        </form>
    </div>
</div>
<div class="container w-full px-6 py-6 mx-auto">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-lg font-semibold mb-4">Daftar Tags</h2>
        <div class="max-h-40 overflow-auto">
            <table id="tags-table" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#tags-table').DataTable({
            scrollX: true,
            scrollY: 200,
            processing: true,
                ajax: {
                    url: '{!! route('tags.data') !!}',
                    type: 'GET'
                },
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'created_at', name: 'created_at',  
                        render: function(data, type, full, meta) {
                            // Convert to a readable date format
                            return moment(data).format('YYYY-MM-DD HH:mm:ss');
                        } 
                    },
                    {
                        data: null,
                        render: function (data, type, row) {
                            return '<a href="/admin/tags/' + data.id + '/edit" class="tw-bg-blue-500 hover:tw-bg-blue-600 tw-text-white tw-font-bold tw-py-2 tw-px-4 tw-rounded"> <i class="fa-solid fa-pen-to-square"></i></a> ' +
                                '<button type="button" class="tw-bg-red-500 hover:tw-bg-red-600 tw-text-white tw-font-bold tw-py-2 tw-px-4 tw-rounded" onclick="handleDelete(this)" data-id="' + data.id + '" data-action="tag"><i class="fa-solid fa-trash"></i></button>';
                        }
                    }
                ]
        });
    });
    </script>
@endsection