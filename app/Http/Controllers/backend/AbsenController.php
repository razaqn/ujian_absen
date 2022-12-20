<?php

namespace App\Http\Controllers\backend;

use App\Models\Absensi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DaftarAbsen;
use App\Models\Siswa;

class AbsenController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Absensi',
            'absensi' => Absensi::get(),
        ];

        return view('backend.absen.index', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Absensi',
            'siswa' => Siswa::get(),
            'daftar_absen' => DaftarAbsen::Where('absen_id', $id)->get(),
            'absensi' => Absensi::find($id),
        ];
        return view('backend.absen.edit' , $data);
    }

    public function edit_process(Request $request, $id)
    {
        // DaftarAbsen::where('absen_id', $id)->delete();

        // foreach(Siswa::get() as $key => $value){
        //     DaftarAbsen::create([
        //         'siswa_id' => $request->siswa_id[$key],
        //         'absen_id' => $id,
        //         'jam' => $request->time[$key],
        //         'hadir' => $request->hadir[$key],
        //     ]);
        // }

        foreach ($request->hadir as $key => $value) {
            echo "<pre>";
            print_r($value);
            echo "</pre>";
        }

        // for ($i = 0; $i < count($request->siswa_id); $i++) {
        //     echo "<pre>";
        //     print_r($request->siswa_id[$i]);
        //     echo "</pre>";
        //     echo "<pre>";
        //     print_r($request->hadir[$i]);
        //     echo "</pre>";
        // }
    }
}
