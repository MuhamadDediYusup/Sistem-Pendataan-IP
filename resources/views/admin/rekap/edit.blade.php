@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-md-12">
        <div class="card mb-4">
            <h5 class="card-header">Perbaikan {{ $title }}</h5>
            <div class="card-body demo-vertical-spacing demo-only-element">
                <hr>
                <p class="fw-bold"><i class='bx bx-user'></i> Data Pengguna</p>
                <hr>
                <div class="form-password-toggle">
                    <label class="form-label" for="basic-default-password32">Nama Pengguna</label>
                    <div class="input-group input-group-merge">
                        <input type="text" class="form-control" id="basic-default-password32"
                            placeholder="Masukkan Alamat IP" value="{{ $data->user_name }}">
                    </div>
                </div>
                <div class="form-password-toggle">
                    <label class="form-label" for="basic-default-password32">Divisi</label>
                    <div class="input-group input-group-merge">
                        <input type="text" class="form-control" id="basic-default-password32"
                            placeholder="Masukkan Alamat IP" value="{{ $data->division }}">
                    </div>
                </div>
                <hr>
                <p class="fw-bold"><i class='bx bx-terminal'></i> Data Spesifikasi Komputer</p>
                <hr>
                <div class="alert alert-dark alert-dismissible mb-0" role="alert">
                    Data spesifikasi komputer diambil secara otomatis oleh sistem. dan tidak bisa di ubah. Jika menemui
                    kesalahan pada pembacaan spesifikasi secara otomatis berikan lampiran foto sebagai detail informasi
                    untuk perbaikan data oleh admin.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <div class="form-password-toggle">
                    <label class="form-label is-valid" for="basic-default-password32">Alamat IP</label>
                    <div class="input-group input-group-merge">
                        <input type="text" class="form-control" id="basic-default-password32"
                            placeholder="Masukkan Alamat IP" value="{{ $data->ip_address }}" readonly>
                    </div>
                </div>
                <div class="form-password-toggle">
                    <label class="form-label" for="basic-default-password32">Nama Komputer</label>
                    <div class="input-group input-group-merge">
                        <input type="text" class="form-control" id="basic-default-password32"
                            placeholder="Masukkan Alamat IP" value="{{ $data->computer_name }}" readonly>
                    </div>
                    <span class="invalid-feedback" role="alert">
                        <strong>Data IP di dapatkan secara otomatis oleh sistem</strong>
                    </span>
                </div>

                <div class="form-password-toggle">
                    <label class="form-label" for="basic-default-password32">RAM Komputer</label>
                    <div class="input-group input-group-merge">
                        <input type="text" class="form-control" id="basic-default-password32"
                            placeholder="Masukkan Alamat IP" value="{{ $data->ram }}">
                    </div>
                </div>
                <div class="form-password-toggle">
                    <label class="form-label" for="basic-default-password32">Sistem Operasi Komputer</label>
                    <div class="input-group input-group-merge">
                        <input type="text" class="form-control" id="basic-default-password32"
                            placeholder="Masukkan Alamat IP" value="{{ $data->os }}">
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