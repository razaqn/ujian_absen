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
        $daftar = DaftarAbsen::Where('absen_id', $id)->get();
        $arrays = [];
        $jam = [];

        foreach($daftar as $key => $value) {
            $arrays[] = $value->siswa_id;
            $jam[$value->siswa_id] = $value->jam;
        }


        $data = [
            'title' => 'Absensi',
            'siswa' => Siswa::get(),
            'daftar_absen' => $arrays,
            'jam' => $jam,
            'absensi' => Absensi::find($id),
        ];
        return view('backend.absen.edit' , $data);

    }

    public function edit_process(Request $request, $id)
    {
        DaftarAbsen::where('absen_id', $id)->delete();


        foreach ($request->hadir as $key => $value) {
            DaftarAbsen::create([
                'siswa_id' => $value,
                'absen_id' => $id,
                'jam' => $request->time[$key],
            ]);
        }

        return redirect()->route('backend.manage.absensi')->with('success', 'Absen #'.$id.' updated successfully');
    }

    public function delete($id) {
        DaftarAbsen::where('absen_id', $id)->delete();
        Absensi::where('id', $id)->delete();

        return redirect()->route('backend.manage.absensi')->with('success', 'Absen #'.$id.' deleted successfully');
    }
}
