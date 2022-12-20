<?php

namespace App\Http\Controllers\backend;

use App\Models\Absensi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
