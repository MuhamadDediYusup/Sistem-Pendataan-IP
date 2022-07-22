@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 ">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="row card-header">
                <div class="col-8">
                    <h5 class="">{{ $title }} Pendataan Alamat IP</h5>
                </div>
                <div class="col-4">
                    <a href="{{ route('rekapTambah') }}" class="btn m-1 mr-4 btn-primary float-right">Tambah</a>
                </div>
            </div>
            <div class="card-body demo-vertical-spacing demo-only-element">
                <table id="myTable" class="table-striped">
                    <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th>Alamat IP</th>
                            <th>Nama Pengguna</th>
                            <th>Tempat/Lokasi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->ip_address }}</td>
                            <td>{{ $item->user_name }}</td>
                            <td>{{ $item->detail_ruangan }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <a href="{{ url('/rekap/show/'. $item->id) }}"
                                    class="btn btn-primary btn-sm text-decoration-none text-white"
                                    data-bs-toggle="tooltip" data-bs-html="true" title="Detail"><i
                                        class='bx bx-detail'></i></a>
                                <a href="{{ url('/rekap/edit/' . $item->id) }}"
                                    class="btn btn-secondary btn-sm text-decoration-none text-white"
                                    data-bs-toggle="tooltip" data-bs-html="true" title="Edit"><i
                                        class='bx bx-edit-alt'></i></a>
                                <a href="{{ url('/rekap/delete/' . $item->id) }}"
                                    class="btn btn-danger btn-sm text-decoration-none text-white"
                                    data-bs-toggle="tooltip" data-bs-html="true" title="Hapus"><i
                                        class='bx bx-trash-alt'></i></a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                        @endforeach
                    </tbody>
                </table>
                x
            </div>
        </div>
    </div>
    @endsection

    @push('js')
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

    <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>
    <script>
        $(document).ready(function () {
    $('#myTable').DataTable({
        "sort" : false,
    });
});
    </script>
    @endpush

    @push('css')
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    @endpush