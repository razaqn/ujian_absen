<?php

namespace App\Http\Controllers\Backend;

use App\Models\Mapel;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{

    public function __construct()
    {
        $this->middleware('is_admin');
    }

    public function index() {
        $data = [
            'title' => 'Siswa',
            'siswa' => Siswa::get(),
        ];

        return view('backend.siswa.index', $data);
    }

    public function create() {
        return view('backend.siswa.create');
    }

    public function create_process(Request $request) {
        $rule = [
            'name' => 'required',
        ];

        $messages = [
            'name.required' => 'The field <strong>name</strong> is required!',
        ];

        $validator = Validator::make($request->all(), $rule, $messages);

        if ($validator->fails()) {
            return redirect()->route('backend.create.siswa')->withErrors($validator)->withInput();
        } else {
            Siswa::create($request->all());
            return redirect()->route('backend.manage.siswa')->with('succes', "Siswa <strong>{$request->name}</strong> created successfully");
        }
    }

    public function edit($id) {
        $data = [
            'siswa' => Siswa::find($id),
        ];

        return view('backend.siswa.edit', $data);
    }
}
