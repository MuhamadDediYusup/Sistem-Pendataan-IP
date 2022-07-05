@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-md-12">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }} Pendataan Alamat IP</h5>
            <div class="card-body demo-vertical-spacing demo-only-element">
                <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th>Nama Pengguna</th>
                            <th>Divisi</th>
                            <th>Alamat IP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->user_name }}</td>
                            <td>{{ $item->division }}</td>
                            <td>{{ $item->ip_address }}</td>
                            <td>
                                <a href="" class="btn btn-primary btn-sm text-decoration-none text-white"
                                    data-bs-toggle="tooltip" data-bs-html="true" title="Detail"><i
                                        class='bx bx-detail'></i></a>
                                <a href="" class="btn btn-secondary btn-sm text-decoration-none text-white"
                                    data-bs-toggle="tooltip" data-bs-html="true" title="Edit"><i
                                        class='bx bx-edit-alt'></i></a>
                                <a href="" class="btn btn-danger btn-sm text-decoration-none text-white"
                                    data-bs-toggle="tooltip" data-bs-html="true" title="Hapus"><i
                                        class='bx bx-trash-alt'></i></a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
@endpush

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endpush