<!-- plugin for charts  -->
<script src="{{ asset('/') }}assets/js/plugins/chartjs.min.js" async></script>
<!-- plugin for scrollbar  -->
<script src="{{ asset('/') }}assets/js/plugins/perfect-scrollbar.min.js" async></script>
<!-- main script file  -->
<script src="{{ asset('/') }}assets/js/argon-dashboard-tailwind.js?v=1.0.1" async></script>

<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace( 'content' );
</script>
<script>
// Menangani klik tombol hapus
    document.getElementById('deleteButton').addEventListener('click', function (event) {
        event.preventDefault(); // Mencegah aksi default link

        // Tampilkan SweetAlert konfirmasi
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda akan menghapus kategori ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika pengguna menekan tombol "Ya, hapus!", lanjutkan dengan mengarahkan ke rute hapus
                window.location.href = event.target.href;
            }
        });
    });
</script>
<script type="text/javascript">
    CKEDITOR.replace('my-content', {
        filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token() ]) }}",
        filebrowserUploadMethod: 'form'
    });
</script>