@extends('layouts.main')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    @if ($cek == 'true')
        @if(!$data->ip_address == null && !$data->user_name == null && !$data->detail_ruangan == null)
        <div class="alert alert-info text-black" id="cek" role="alert">IP Komputer Anda sudah terdaftar pada
        sistem,
        Jika ada kesalahan silahkan diperbaiki pada form yang tersedia.</div>
        @else
        <div class="alert alert-danger text-black" id="cek" role="alert">IP Komputer Anda belum terdaftar pada
        sistem, Silahkan melakukan pendataan <a href="{{ url('pendataan') }}">disini</a>.</div>
        @endif
    @else
    <div class="alert alert-danger text-black" id="cek" role="alert">IP Komputer Anda belum terdaftar pada
    sistem, Silahkan melakukan pendataan <a href="{{ url('pendataan') }}">disini</a>.</div>
    @endif
   <div class="row">
    <div class="col-4">
      <div class="card">
        <div class="card-body border-bottom">
          <div class="d-flex justify-content-between align-items-center flex-wrap">
            <h6 class="mb-2 mb-md-0 font-weight-medium">Statistik IP</h6>
          </div>
        </div>
        <div class="card-body">
            <div>
                <canvas id="myChart"></canvas>
            </div>
          <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3 mt-4">
            <div class="d-flex flex-column justify-content-center align-items-center">
              <p class="text-muted">Aktif</p>
              <h5>{{ $aktif }}</h5>
            </div>
            <div class="d-flex flex-column justify-content-center align-items-center">
              <p class="text-muted">Sistem</p>
              <h5>{{ $sistem }}</h5>
            </div>
            <div class="d-flex flex-column justify-content-center align-items-center">
              <p class="text-muted">Tersedia</p>
              <h5>{{ $tersedia }}</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="card mb-4">
        <div class="card-body demo-vertical-spacing demo-only-element">
          <table id="myTable" class="table-striped">
            <thead>
              <tr>
                <th width="1%">No</th>
                <th>Alamat IP</th>
                <th>Nama Pengguna</th>
                <th>Tempat</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1 ?>
              @foreach ($pendataan as $item)
              <tr>
                <td>{{ $i }}</td>
                <td>
                    @if (Auth::user()->role == 'admin')
                        @if ($item->ip_address == $ip)
                        <a class="utama" href="{{ url('/pendataan') }}">{{ $item->ip_address }}</a>
                        <sup class="text-danger">
                            *IP Anda
                        </sup>
                        @else
                        {{ $item->ip_address }}
                        @endif
                    @else
                        @if ($item->ip_address == $ip)
                        <a class="utama" href="{{ url('/pendataan') }}">{{ $item->ip_address }}</a>
                        <sup class="text-danger">
                            *IP Anda
                        </sup>
                        @else
                        {{ substr($item->ip_address, 0, 10) }}xxx
                        @endif
                    @endif

                </td>
                <td>{{ $item->user_name }}</td>
                <td>{{ $item->detail_ruangan }}</td>
                <td>{{ $item->status }}</td>
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
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

    <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>
    <script>
        $(document).ready(function () {
        $('#myTable').DataTable({
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": false,
            "bAutoWidth": false,
            "searching": false,
            "paging": false });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.utama').css('font-weight', 'bold');
            $('.utama').css('color', 'red');
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const data = {
        labels: [
            'Aktif',
            'Sistem',
            'Tersedia'
        ],
        datasets: [{
            label: 'My First Dataset',
            data: [{{ $aktif }}, {{ $sistem }}, {{ $tersedia }}],
            backgroundColor: [
                'rgb(54, 162, 235)',
                'rgb(255, 99, 132)',
                'rgb(255, 205, 86)'
            ],
            hoverOffset: 4
        }]
        };
        const config = {
        type: 'doughnut',
        data: data,
        };
    </script>

    <script>
    const myChart = new Chart(
      document.getElementById('myChart'),
      config
    );
    </script>

  @endpush

  @push('css')
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  @endpush
