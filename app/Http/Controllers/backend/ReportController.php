<?php

namespace App\Http\Controllers\Backend;

use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function index() {
        $data = [
            'title' => 'Siswa',
            'siswa' => Siswa::get(),
        ];

        return view('backend.reporting.index', $data);
    }
}
