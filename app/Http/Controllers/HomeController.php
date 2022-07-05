<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Pendataanip;

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
        $data = [
            'title' => 'Home',
            'pendataan' => Pendataanip::all(),
        ];
        return view('admin/index', $data);
    }

    public function pendataan()
    {
        $checkIP = Pendataanip::where('ip_address', getHostByName(getHostName()))->first();
        if ($checkIP) {
            $data = [
                'title' => 'Pendataan',
                'checkIP' => $checkIP,
                'ip' => getHostByName(getHostName()),
                'data' => Pendataanip::where('ip_address', getHostByName(getHostName()))->first(),
            ];
            return view('admin/pendataan/index', $data);
        } else {
            return redirect()->route('rekapCreate');
        }
    }

    public function rekap()
    {
        $data = [
            'title' => 'Rekap',
            'data' => Pendataanip::all(),
        ];
        return view('admin/rekap/index', $data);
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
            'title' => 'Pendataan',
            'data' => Pendataanip::find($id),
            'spesifikasi' => [
                'ip' => getHostByName(getHostName()),
            ]
        ];
        return view('admin/rekap/edit', $data);
    }
}
