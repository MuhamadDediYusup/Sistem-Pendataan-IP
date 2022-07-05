@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-md-12">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }} Alamat IP</h5>
            <div class="card-body demo-vertical-spacing demo-only-element">

                @if(!$checkIP == null)
                <div class="alert alert-info text-black" role="alert">IP Pada Komputer Anda Sudah Terdata Pada Sistem,
                    Jika Ada
                    Kesalahan Data Silahkan Ajukan Perbaikan Data Dengan Menekan Tombol <b>Ajukan Perbaikan</b></div>

                <hr>
                <p class="fw-bold"><i class='bx bx-user'></i> Data Pengguna</p>
                <hr>
                <div class="form-password-toggle">
                    <label class="form-label" for="basic-default-password32">Nama Pengguna</label>
                    <div class="input-group input-group-merge">
                        <input type="text" class="form-control" id="basic-default-password32"
                            placeholder="Masukkan Alamat IP" value="{{ $data->user_name }}" readonly>
                    </div>
                </div>
                <div class="form-password-toggle">
                    <label class="form-label" for="basic-default-password32">Divisi</label>
                    <div class="input-group input-group-merge">
                        <input type="text" class="form-control" id="basic-default-password32"
                            placeholder="Masukkan Alamat IP" value="{{ $data->division }}" readonly>
                    </div>
                </div>
                <hr>
                <p class="fw-bold"><i class='bx bx-terminal'></i> Data Spesifikasi Komputer</p>
                <hr>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-password-toggle">
                            <label class="form-label" for="basic-default-password32">Alamat IP</label>
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" id="basic-default-password32"
                                    placeholder="Masukkan Alamat IP" value="{{ $data->ip_address }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-password-toggle">
                            <label class="form-label text-capitalize" for="basic-default-password32">Nama
                                Komputer</label>
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" id="basic-default-password32"
                                    placeholder="Masukkan Alamat IP" value="{{ $data->computer_name }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-password-toggle">
                    <label class="form-label" for="basic-default-password32">RAM Komputer</label>
                    <div class="input-group input-group-merge">
                        <input type="text" class="form-control" id="basic-default-password32"
                            placeholder="Masukkan Alamat IP" value="{{ $data->ram }}" readonly>
                    </div>
                </div>
                <div class="form-password-toggle">
                    <label class="form-label" for="basic-default-password32">Sistem Operasi Komputer</label>
                    <div class="input-group input-group-merge">
                        <input type="text" class="form-control" id="basic-default-password32"
                            placeholder="Masukkan Alamat IP" value="{{ $data->os }}" readonly>
                    </div>
                </div>
                <div class="form-password-toggle">
                    <label class="form-label" for="basic-default-password32">Lampiran Detail Spesifikasi</label>
                    <div class="justify-content-center">
                        <a href="{{ $data->img_path }}" class="img-popup" target="_blank">
                            <img src="{{ $data->img_path }}" alt="" class="img-thumbnail-shadow w-50">
                        </a>
                    </div>
                </div>

                <div class="d-grid gap-2 col-12 pt-3">
                    <a href="/rekap/edit/{{ $data->id }}" class="btn btn-primary d-grid gap-2 d-md-block">Ajukan
                        Perbaikan
                        Data</a>
                </div>

                @else

                @endif
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"
    integrity="sha512-C1zvdb9R55RAkl6xCLTPt+Wmcz6s+ccOvcr6G57lbm8M2fbgn2SUjUJbQ13fEyjuLViwe97uJvwa1EUf4F1Akw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $('.img-popup').magnificPopup({
      type: 'image'
    });
</script>

@endpush

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css"
    integrity="sha512-WEQNv9d3+sqyHjrqUZobDhFARZDko2wpWdfcpv44lsypsSuMO0kHGd3MQ8rrsBn/Qa39VojphdU6CMkpJUmDVw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush