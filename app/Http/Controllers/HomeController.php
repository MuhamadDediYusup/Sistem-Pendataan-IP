<?php

namespace App\Http\Controllers;

use \App\Models\Pendataanip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $status = [
            'aktif' => Pendataanip::where('status', '1')->count(),
            'sistem' => Pendataanip::where('status', '2')->count(),
            'tersedia' => Pendataanip::where('status', '3')->count(),
        ];

        if (Pendataanip::where('ip_address', $_SERVER['REMOTE_ADDR'])->count() > 0) {
            $getIP = Pendataanip::where('ip_address', $_SERVER['REMOTE_ADDR'])->first();
            $cek = "True";
        } else {
            $getIP = "";
            $cek = "False";
        }

        $data = [
            'data' => Pendataanip::all(),
            'ip' => $_SERVER['REMOTE_ADDR'],
            'title' => 'Home',
            'data' => $getIP,
            'cek' => $cek,
            'pendataan' => Pendataanip::all(),
        ];
        return view('admin/index', $status, $data);
    }

    public function pendataan()
    {
        $system = new SystemInfo();
        $ipAddress =  $_SERVER['REMOTE_ADDR'];
        $checkIP = Pendataanip::where('ip_address', $ipAddress)->first();
        $data = [
            'title' => 'Pendataan',
            'checkIP' => $checkIP,
            'ip' => $_SERVER['REMOTE_ADDR'],
            'data' => Pendataanip::where('ip_address', $ipAddress)->first(),
            'computer_name' => getenv('COMPUTERNAME'),
            // 'computer_name' => gethostbyaddr($_SERVER['REMOTE_ADDR']),
            'ram' => round($system->getRamTotal() / 1024 / 1024),
            'os' => php_uname(),

        ];

        return view('admin/pendataan/index', $data);
    }

    public function rekap()
    {
        $data = [
            'title' => 'Rekap',
            'data' => Pendataanip::orderBy('ip_address', 'asc')->get(),
        ];
        return view('admin/rekap/index', $data);
    }

    public function rekapTambah()
    {
        $data = [
            'title' => 'Rekap'
        ];
        return view('admin/rekap/create', $data);
    }

    public function rekapCreate()
    {
        $data = [
            'title' => 'Rekap',
            'data' => Pendataanip::all(),
        ];
        return view('admin/rekap/edit', $data);
    }

    public function rekapEdit($id)
    {
        $data = [
            'title' => 'Rekap',
            'data' => Pendataanip::find($id),
        ];
        return view('admin/rekap/edit', $data);
    }

    public function pendataanUpdate(Request $request)
    {
        $input = $request->all();

        DB::table('pendataan')->where('id', $request->id)->update([
            'ip_address' => request('ip'),
            'computer_name' => request('nama_komputer'),
            'ram' => request('ram'),
            'os' => request('os'),
            'user_name' => request('nama_pengguna'),
            'division' => request('divisi'),
            'detail_ruangan' => request('detail_ruangan'),
            // 'img_dxdiag' => $dxdiag,
            // 'img_dskmgmn' => $filedskmgmn,
            // 'img_ip' => $fileip,
        ]);

        return redirect()->route('pendataan')->with('success', 'Data berhasil diubah');
    }

    public function pendataanStore(Request $request)
    {
        if ($request->hasFile('tcp_ip')) {
            $file = $request->file('tcp_ip');
            $extension = $file->getClientOriginalExtension();
            $fileip = request('ip') . 'tcpip.' . $extension;
            $file->move(public_path('images'), $fileip);
        } else {
            $fileip = null;
        }
        if ($request->hasFile('dxdiag')) {
            // upload file to server folder
            $file = $request->file('dxdiag');
            $extension = $file->getClientOriginalExtension();
            $filedxdiag = 'file__' . request('ip') . '__Dxdiag.' . $extension;
            $file->move(public_path('\images'), $filedxdiag);
        } else {
            $filedxdiag = null;
        }

        if ($request->hasFile('diskmgmn')) {
            $file = $request->file('diskmgmn');
            $extension = $file->getClientOriginalExtension();
            $filedskmgmn = request('ip') . '_DiskManagemen.' . $extension;
            $file->move(public_path('images'), $filedskmgmn);
        } else {
            $filedskmgmn = null;
        }

        $status = '1';
        $status = request('status');

        // store the data in the database
        $data = Pendataanip::create([
            'ip_address' => request('ip'),
            'computer_name' => request('nama_komputer'),
            'ram' => request('ram'),
            'os' => request('os'),
            'user_name' => request('nama_pengguna'),
            'division' => request('divisi'),
            'detail_ruangan' => request('detail_ruangan'),
            'status' => $status,
            'img_dxdiag' => $filedxdiag,
            'img_dskmgmn' => $filedskmgmn,
            'img_ip' => $fileip,
        ])->save();

        return redirect()->route('pendataan')->with('success', 'Data berhasil ditambahkan');
    }

    public function rekapShow($id)
    {
        $data = [
            'title' => 'Rekap',
            'data' => Pendataanip::find($id),
        ];
        return view('admin/rekap/show', $data);
    }

    public function rekapStore(Request $request)
    {
        if ($request->hasFile('tcp_ip')) {
            $file = $request->file('tcp_ip');
            $extension = $file->getClientOriginalExtension();
            $fileip = request('ip') . 'tcpip.' . $extension;
            $file->move(public_path('images'), $fileip);
        } else {
            $fileip = null;
        }
        if ($request->hasFile('dxdiag')) {
            // upload file to server folder
            $file = $request->file('dxdiag');
            $extension = $file->getClientOriginalExtension();
            $filedxdiag = 'file__' . request('ip') . '__Dxdiag.' . $extension;
            $file->move(public_path('\images'), $filedxdiag);
        } else {
            $filedxdiag = null;
        }

        if ($request->hasFile('diskmgmn')) {
            $file = $request->file('diskmgmn');
            $extension = $file->getClientOriginalExtension();
            $filedskmgmn = request('ip') . '_DiskManagemen.' . $extension;
            $file->move(public_path('images'), $filedskmgmn);
        } else {
            $filedskmgmn = null;
        }

        Pendataanip::create([
            'ip_address' => request('ip'),
            'computer_name' => request('nama_komputer'),
            'ram' => request('ram'),
            'os' => request('os'),
            'user_name' => request('nama_pengguna'),
            'division' => request('divisi'),
            'detail_ruangan' => request('detail_ruangan'),
            'status' => request('status'),
            'img_dxdiag' => $filedxdiag,
            'img_dskmgmn' => $filedskmgmn,
            'img_ip' => $fileip,
        ])->save();

        return redirect()->route('rekap')->with('success', 'Data berhasil ditambahkan');
    }

    public function RekapUpdate(Request $request)
    {
        $input = $request->all();

        if ($image = $request->file('dxdiag')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['dxdiag'] = "$profileImage";
        } else {
            unset($input['dxdiag']);
        }

        DB::table('pendataan')->where('id', $request->id)->update([
            'ip_address' => request('ip'),
            'computer_name' => request('nama_komputer'),
            'ram' => request('ram'),
            'os' => request('os'),
            'user_name' => request('nama_pengguna'),
            'division' => request('divisi'),
            'detail_ruangan' => request('detail_ruangan'),
            // 'img_dxdiag' => $filedxdiag,
            // 'img_dskmgmn' => $filedskmgmn,
            // 'img_ip' => $fileip,
        ]);

        return redirect()->route('rekap')->with('success', 'Data berhasil diubah');
    }


    public function rekapDelete($id)
    {
        Pendataanip::destroy($id);
        return redirect()->route('rekap')->with('success', 'Data berhasil dihapus');
    }
}


class SystemInfo
{

    /**
     * Return RAM Total in Bytes.
     *
     * @return int Bytes
     */
    public function getRamTotal()
    {
        $result = 0;
        if (PHP_OS == 'WINNT') {
            $lines = null;
            $matches = null;
            exec('wmic ComputerSystem get TotalPhysicalMemory /Value', $lines);
            if (preg_match('/^TotalPhysicalMemory\=(\d+)$/', $lines[2], $matches)) {
                $result = $matches[1];
            }
        } else {
            $fh = fopen('/proc/meminfo', 'r');
            while ($line = fgets($fh)) {
                $pieces = array();
                if (preg_match('/^MemTotal:\s+(\d+)\skB$/', $line, $pieces)) {
                    $result = $pieces[1];
                    // KB to Bytes
                    $result = $result * 1024;
                    break;
                }
            }
            fclose($fh);
        }
        // KB RAM Total
        return (int) $result;
    }

    /**
     * Return free RAM in Bytes.
     *
     * @return int Bytes
     */
    public function getRamFree()
    {
        $result = 0;
        if (PHP_OS == 'WINNT') {
            $lines = null;
            $matches = null;
            exec('wmic OS get FreePhysicalMemory /Value', $lines);
            if (preg_match('/^FreePhysicalMemory\=(\d+)$/', $lines[2], $matches)) {
                $result = $matches[1] * 1024;
            }
        } else {
            $fh = fopen('/proc/meminfo', 'r');
            while ($line = fgets($fh)) {
                $pieces = array();
                if (preg_match('/^MemFree:\s+(\d+)\skB$/', $line, $pieces)) {
                    // KB to Bytes
                    $result = $pieces[1] * 1024;
                    break;
                }
            }
            fclose($fh);
        }
        // KB RAM Total
        return (int) $result;
    }

    /**
     * Return harddisk infos.
     *
     * @param sring $path Drive or path
     * @return array Disk info
     */
    public function getDiskSize($path = '/')
    {
        $result = array();
        $result['size'] = 0;
        $result['free'] = 0;
        $result['used'] = 0;

        if (PHP_OS == 'WINNT') {
            $lines = null;
            exec('wmic logicaldisk get FreeSpace^,Name^,Size /Value', $lines);
            foreach ($lines as $index => $line) {
                if ($line != "Name=$path") {
                    continue;
                }
                $result['free'] = explode('=', $lines[$index - 1])[1];
                $result['size'] = explode('=', $lines[$index + 1])[1];
                $result['used'] = $result['size'] - $result['free'];
                break;
            }
        } else {
            $lines = null;
            exec(sprintf('df /P %s', $path), $lines);
            foreach ($lines as $index => $line) {
                if ($index != 1) {
                    continue;
                }
                $values = preg_split('/\s{1,}/', $line);
                $result['size'] = $values[1] * 1024;
                $result['free'] = $values[3] * 1024;
                $result['used'] = $values[2] * 1024;
                break;
            }
        }
        return $result;
    }

    /**
     * Get CPU Load Percentage.
     *
     * @return float load percentage
     */
    public function getCpuLoadPercentage()
    {
        $result = -1;
        $lines = null;
        if (PHP_OS == 'WINNT') {
            $matches = null;
            exec('wmic.exe CPU get loadpercentage /Value', $lines);
            if (preg_match('/^LoadPercentage\=(\d+)$/', $lines[2], $matches)) {
                $result = $matches[1];
            }
        } else {
            // https://github.com/Leo-G/DevopsWiki/wiki/How-Linux-CPU-Usage-Time-and-Percentage-is-calculated
            //$tests = array();
            //$tests[] = 'cpu  3194489 5224 881924 305421192 603380 76 52143 106209 0 0';
            //$tests[] = 'cpu  3194490 5224 881925 305422568 603380 76 52143 106209 0 0';

            $checks = array();
            foreach (array(0, 1) as $i) {
                $cmd = '/proc/stat';
                #$cmd = 'grep \'cpu \' /proc/stat <(sleep 1 && grep \'cpu \' /proc/stat) | awk -v RS="" \'{print ($13-$2+$15-$4)*100/($13-$2+$15-$4+$16-$5) "%"}\'';
                #exec($cmd, $lines);
                $lines = array();
                $fh = fopen($cmd, 'r');
                while ($line = fgets($fh)) {
                    $lines[] = $line;
                }
                fclose($fh);
                //$lines = array($tests[$i]);

                foreach ($lines as $line) {
                    $ma = array();
                    if (!preg_match('/^cpu  (\d+) (\d+) (\d+) (\d+) (\d+) (\d+) (\d+) (\d+) (\d+) (\d+)$/', $line, $ma)) {
                        continue;
                    }
                    /**
                     * The meanings of the columns are as follows, from left to right:
                      1st column : user = normal processes executing in user mode
                      2nd column : nice = niced processes executing in user mode
                      3rd column : system = processes executing in kernel mode
                      4th column : idle = twiddling thumbs
                      5th column : iowait = waiting for I/O to complete
                      6th column : irq = servicing interrupts
                      7th column : softirq = servicing softirqs
                      8th column:
                      9th column:
                      Calculation:
                      sum up all the columns in the 1st line "cpu" :
                      ( user + nice + system + idle + iowait + irq + softirq )
                      this will yield 100% of CPU time
                      calculate the average percentage of total 'idle' out of 100% of CPU time :
                      ( user + nice + system + idle + iowait + irq + softirq ) = 100%
                      ( idle ) = X %
                      TOTAL USER = %user + %nice
                      TOTAL CPU = %user + %nice + %system
                      TOTAL IDLE = %iowait + %steal + %idle
                     */
                    $total = $ma[1] + $ma[2] + $ma[3] + $ma[4] + $ma[5] + $ma[6] + $ma[7] + $ma[8] + $ma[9];
                    //$totalCpu = $ma[1] + $ma[2] + $ma[3];
                    //$result = (100 / $total) * $totalCpu;
                    $ma['total'] = $total;
                    $checks[] = $ma;
                    break;
                }

                if ($i == 0) {
                    // Wait before checking again.
                    sleep(1);
                }
            }

            // Idle - prev idle
            $diffIdle = $checks[1][4] - $checks[0][4];

            // Total - prev total
            $diffTotal = $checks[1]['total'] - $checks[0]['total'];

            // Usage in %
            $diffUsage = (1000 * ($diffTotal - $diffIdle) / $diffTotal + 5) / 10;
            $result = $diffUsage;
        }
        return (float) $result;
    }
}
