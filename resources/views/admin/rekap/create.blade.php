@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-md-12">
        <div class="card mb-4">
            <h5 class="card-header">Edit {{ $title }}</h5>
            <div class="card-body demo-vertical-spacing demo-only-element">
                <form action="{{ url('/rekap/store') }}" method="POST">
                    @csrf @method('POST')
                    <div class="row">
                        <div class="col-lg-6">

                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Alamat IP</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="basic-default-password32"
                                        placeholder="Masukkan Alamat IP" value="" name="ip">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama
                                    Komputer</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="basic-default-password32"
                                        placeholder="Masukkan Nama Komputer" value="" name="nama_komputer">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">

                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">RAM</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="basic-default-password32"
                                        placeholder="Masukkan RAM" value="" name="ram">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Sistem Operasi
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="basic-default-password32"
                                        placeholder="Masukkan OS" value="" name="os">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Detail Tempat
                                </label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="detail_ruangan" id="" cols="2" rows="2"
                                        placeholder="Masukkan detail tempat komputer anda seperti nomor lantai atau ruangan"
                                        required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama
                                    Pengguna</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="basic-default-password32"
                                        placeholder="Masukkan Alamat IP" value="" name="nama_pengguna">
                                    <input type="hidden" name="id" value="" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Status
                                </label>
                                <div class="col-sm-9">
                                    <select name="status" class="form-control">
                                        <option value="1">Aktif</option>
                                        <option value="2">Sistem</option>
                                        <option value="3">Tersedia</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label mt-3">Lampiran Screenshoot dxdiag</label>
                                <div class="justify-content-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="file" id="input-file-now" class="dropify" data-height="300"
                                                data-max-file-size="1M" name="dxdiag" value="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-6">
                            <div class="form-group">
                                <label class="form-label mt-3">Lampiran Screenshoot TCP/IP</label>
                                <div class="justify-content-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="file" id="input-file-now" class="dropify" data-height="300"
                                                data-max-file-size="1M" name="tcp_ip" value="" />
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
                                            <input type="file" id="input-file-now" class="dropify" data-height="300"
                                                data-max-file-size="1M" name="diskmgmn" value="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid gap-2 col-12 pt-3">
                        <button type="submit" class="btn btn-primary d-grid gap-2 d-md-block">Simpan</button>
                    </div>
                </form>
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
