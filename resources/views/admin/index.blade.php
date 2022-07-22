@extends('layouts.main')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card-body">
    <div class="row">
      <div class="col-4">
        <div class="card">
          <div class="card-body border-bottom">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
              <h6 class="mb-2 mb-md-0 text-uppercase font-weight-medium">Overall IP</h6>
            </div>
          </div>
          <div class="card-body">
            <div class="chartjs-size-monitor">
              <div class="chartjs-size-monitor-expand">
                <div class=""></div>
              </div>
              <div class="chartjs-size-monitor-shrink">
                <div class=""></div>
              </div>
            </div>
            <canvas id="sales-chart-c" class="mt-2 chartjs-render-monitor" width="753" height="376"
              style="display: block; width: 753px; height: 376px;"></canvas>
            <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3 mt-4">
              <div class="d-flex flex-column justify-content-center align-items-center">
                <p class="text-muted">IP Aktif</p>
                <h5>492</h5>
                <div class="d-flex align-items-baseline">
                  <p class="text-success mb-0">0.5%</p>
                  <i class="typcn typcn-arrow-up-thick text-success"></i>
                </div>
              </div>
              <div class="d-flex flex-column justify-content-center align-items-center">
                <p class="text-muted">IP Nonaktif</p>
                <h5>87k</h5>
                <div class="d-flex align-items-baseline">
                  <p class="text-success mb-0">0.8%</p>
                  <i class="typcn typcn-arrow-up-thick text-success"></i>
                </div>
              </div>
              <div class="d-flex flex-column justify-content-center align-items-center">
                <p class="text-muted">IP Tersedia</p>
                <h5>882</h5>
                <div class="d-flex align-items-baseline">
                  <p class="text-danger mb-0">-04%</p>
                  <i class="typcn typcn-arrow-down-thick text-danger"></i>
                </div>
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
                @foreach ($data as $item)
                <tr>
                  <td>{{ $i }}</td>
                  <td>

                    {{-- if ip computer is same in database make a link --}}
                    @if ($item->ip_address == $ip)
                    <a class="utama" href="{{ url('/pendataan') }}">{{ $item->ip_address }}</a>
                    <sup class="text-danger">
                      *IP Anda
                    </sup>
                    @else
                    {{ substr($item->ip_address, 0, 10) }}xxx
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
  @endpush

  @push('css')
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  @endpush