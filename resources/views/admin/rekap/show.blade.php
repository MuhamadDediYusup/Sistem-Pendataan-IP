@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card-body">
    <div class="col-md-12">
        <div class="card mb-4">
            <h5 class="card-header">Edit {{ $title }}</h5>
            <div class="card-body demo-vertical-spacing demo-only-element">
                <form action="{{ url('/rekap/update') }}" method="POST">
                    @csrf @method('POST')
                    <div class="row">
                        <div class="col-lg-6">

                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Alamat IP</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="basic-default-password32"
                                    placeholder="Masukkan Alamat IP" value="{{ $data->ip_address }}" name="ip" disabled
                                >
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama
                                    Komputer</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="basic-default-password32"
                                    placeholder="Masukkan Alamat IP" value="{{ $data->computer_name }}" disabled
                                    name="nama_komputer">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">

                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">RAM Komputer</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="basic-default-password32"
                                    placeholder="Masukkan Alamat IP" value="{{ $data->ram }}" name="ram" disabled>
                                </div>
                              </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Sistem Operasi
                                    Komputer</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="basic-default-password32"
                                    placeholder="Masukkan Alamat IP" value="{{ $data->os }}" name="os" disabled>
                                </div>
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">

                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama Pengguna</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="basic-default-password32"
                                        placeholder="Masukkan Alamat IP" value="{{ $data->user_name }}"
                                        name="nama_pengguna" disabled>
                                    <input type="hidden" name="id" value="{{ $data->id }}" required>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6">

                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Jabatan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="basic-default-password32"
                                        placeholder="Masukkan Alamat IP" value="{{ $data->division }}" name="divisi" required disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Detail Tempat <sup class="text-danger">*Detail lokasi / lantai
                                / ruangan</sup></label>
                        <textarea class="form-control" name="detail_ruangan" id="" cols="30" rows="2"
                            placeholder="Masukkan detail tempat komputer anda seperti nomor lantai atau ruangan" required disabled>{{ $data->detail_ruangan }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label mt-3">Lampiran Screenshoot dxdiag</label>
                                <div class="justify-content-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <img class="img-fluid" src="{{ asset('images/'.$data->img_dxdiag) }}" alt="Screenshot Dxdiag" style="max-width: 380px>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label mt-3">Lampiran Screenshoot TCP/IP</label>
                                <div class="justify-content-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <img class="img-fluid" src="{{ asset('images/'.$data->img_ip) }}" alt="Screenshot TCP/IP" style="max-width: 380px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label mt-3">Lampiran Screenshoot Disk
                                    Management</label>
                                <div class="justify-content-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <img class="img-fluid" src="{{ asset('images/'.$data->img_dskmgmn) }}" alt="Screenshot Disk Management" style="max-width: 380px>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid gap-2 col-12 pt-3">
                        <a href="{{ route('rekap') }}" class="btn btn-primary d-grid gap-2 d-md-block">Kembali Ke Rekap Data</a>
                    </div>
                </form>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
<script>
    $('.dropify').dropify();
</script>
@endpush

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css"
    integrity="sha512-WEQNv9d3+sqyHjrqUZobDhFARZDko2wpWdfcpv44lsypsSuMO0kHGd3MQ8rrsBn/Qa39VojphdU6CMkpJUmDVw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
@endpush
