@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: "{{ session('success') }}",
        });
    </script>
@endif

@if (session('Gagal'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: "{{ session('Gagal') }}",
        });
    </script>
@endif

@if (session('Hapus'))
    <script>
        Swal.fire({
            icon: 'info',
            title: 'Deleted',
            text: "{{ session('Hapus') }}",
        });
    </script>
@endif

@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            html: '{!! implode("<br>", $errors->all()) !!}',
        });
    </script>
@endif
