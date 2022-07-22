<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

{{-- swall allert --}}
@if (session('success'))
<script>
    swal({
        title: "Berhasil",
        text: "{{ session('success') }}",
        icon: "success",
        button: "OK",
    });
</script>
@endif

@if(session('error'))
<script>
    swal({
        title: "Error",
        text: "{{ session('error') }}",
        icon: "error",
        button: "OK",
    });
</script>
@endif