@extends('layout.main')
@section('content')
<div class="container w-full px-6 py-6 mx-auto">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-lg font-semibold mb-4">Daftar Users</h2>
        <div class="max-h-40 overflow-auto">
            <table id="users-table" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Join Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#users-table').DataTable({
            scrollX: true,
            scrollY: 200,
            processing: true,
                ajax: {
                    url: '{!! route('users.data') !!}',
                    type: 'GET'
                },
                columns: [
                    { data: 'full_name', name: 'full_name' },
                    { data: 'username', name: 'username' },
                    { data: 'email', name: 'email' },
                    { data: 'role', name: 'role' },
                    { data: 'created_at', name: 'created_at',  
                        render: function(data, type, full, meta) {
                            // Convert to a readable date format
                            return moment(data).format('YYYY-MM-DD HH:mm:ss');
                        } 
                    },           
                    {
                        data: null,
                        render: function (data, type, row) {
                            return '<button type="button" class="tw-bg-red-500 hover:tw-bg-red-600 tw-text-white tw-font-bold tw-py-2 tw-px-4 tw-rounded" onclick="handleDelete(this)" data-id="' + data.id + '" data-action="users"><i class="fa-solid fa-trash"></i></button>';
                        }
                    }
                ]
        });
    });
    </script>

@endsection