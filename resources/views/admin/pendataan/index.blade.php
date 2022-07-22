@extends('layouts.main')

@section('content')
{{-- <div class="card-body"> --}}
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-md-12">
            <div class="my-auto">
                @if(!$checkIP == null && !$data->user_name == null && !$data->detail_ruangan == null)
                <div class="alert alert-info text-black" id="cek" role="alert">IP Komputer Anda sudah terdaftar pada
                    sistem,
                    Jika ada kesalahan silahkan diperbaiki pada form yang tersedia.</div>
                @else
                <div class="alert alert-danger text-black" id="cek" role="alert">IP Komputer Anda sudah terdaftar pada
                    sistem,
                    Jika ada kesalahan silahkan diperbaiki pada form yang tersedia.</div>
                @endif
            </div>
            <div class="card mb-4">
                <h5 class="card-header">{{ $title }} Alamat IP</h5>
                <div class="card-body demo-vertical-spacing demo-only-element">

                    @if(!$checkIP == null)
                    <form action="{{ url('/pendataan/update') }}" method="POST">
                        @csrf @method('POST')
                        <div class="row">
                            <div class="col-lg-6">

                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Alamat IP</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="basic-default-password32"
                                            placeholder="Masukkan Alamat IP" value="{{ $data->ip_address }}" name="ip"
                                            readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama
                                        Komputer</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="basic-default-password32"
                                            placeholder="Masukkan Alamat IP" value="{{ $data->computer_name }}"
                                            name="nama_komputer" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Sistem Operasi
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="basic-default-password32"
                                            placeholder="Masukkan Alamat IP" value="{{ $data->os }}" name="os" readonly>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">RAM</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="basic-default-password32"
                                            placeholder="Masukkan Alamat IP" value="{{ $data->ram }}" name="ram"
                                            readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Lokasi
                                    </label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="detail_ruangan" id="" cols="2" rows="2"
                                            placeholder="..Unit Organisasi, Perangkat Daerah.."
                                            required>{{ $data->detail_ruangan }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama
                                        Pengguna</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="basic-default-password32"
                                            placeholder="..Nama.." value="{{ $data->user_name }}" name="nama_pengguna">
                                        <input type="hidden" name="id" value="{{ $data->id }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">

                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label mt-3">Lampiran Screenshoot dxdiag</label>
                                    <div class="justify-content-center">
                                        <div class="row">
                                            <div class="col-12">
                                                <input type="file" id="input-file-now" class="dropify" data-height="300"
                                                    data-max-file-size="1M" name="dxdiag"
                                                    data-default-file="{{ $data->img_dxdiag ? asset('images/'.$data->img_dxdiag) : ''  }}"
                                                    value="{{ asset('images/'.$data->img_dxdiag) }}" />
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
                                                <input type="file" id="input-file-now" class="dropify" data-height="300"
                                                    data-max-file-size="1M" name="tcp_ip"
                                                    data-default-file="{{ $data->img_ip ? asset('images/'.$data->img_ip) : '' }}"
                                                    value="{{ asset('images/'.$data->img_ip) }}" />
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
                                                    data-max-file-size="1M" name="diskmgmn"
                                                    data-default-file="{{ $data->img_dskmgmn ? asset('images/'.$data->img_dskmgmn) : '' }}"
                                                    value="{{ asset('images/'.$data->img_dskmgmn) }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2 col-12 pt-3">
                            <button type="submit" class="btn btn-primary d-grid gap-2 d-md-block">Simpan
                            </button>
                        </div>
                    </form>

                    @else
                    <form action="{{ url('/pendataan/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf @method('POST')
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Alamat IP</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="basic-default-password32"
                                            placeholder="Masukkan Alamat IP" value="{{ $ip }}" name="ip"
                                            readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama
                                        Komputer</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="basic-default-password32"
                                            placeholder="Masukkan Alamat IP" value="{{ $computer_name }}"
                                            name="nama_komputer" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Sistem Operasi
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="basic-default-password32"
                                            placeholder="Masukkan Alamat IP" value="{{ $os }}" name="os" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">RAM</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="basic-default-password32"
                                            placeholder="Masukkan Alamat IP" value="{{ $ram }}" name="ram"
                                            readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Lokasi
                                    </label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="detail_ruangan" id="" cols="2" rows="2"
                                            placeholder="..Unit Organisasi, Perangkat Daerah.."
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
                                            placeholder="..Nama.." value="" name="nama_pengguna">
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
                                                    data-max-file-size="1M" name="dxdiag" />
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
                                                <input type="file" id="input-file-now" class="dropify" data-height="300"
                                                    data-max-file-size="1M" name="tcp_ip" />
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
                                                    data-max-file-size="1M" name="diskmgmn" />
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
                    @endif
                </div>
                {{--
            </div> --}}
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

    <script>
        setTimeout(
            element = document.getElementById("cek");
            element.classList.add("d-none");
            console.log('hai');
        , 2000)
    </script>

    @endpush

    @push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css"
        integrity="sha512-WEQNv9d3+sqyHjrqUZobDhFARZDko2wpWdfcpv44lsypsSuMO0kHGd3MQ8rrsBn/Qa39VojphdU6CMkpJUmDVw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
    @endpush
