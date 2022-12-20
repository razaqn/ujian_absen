<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Mapel;

class MapelController extends Controller
{
    public function index() {
        $mapel = Mapel::get();
        return view('backend.mapel.index', compact('mapel'));
    }

    public function create() {
        return view('backend.mapel.create');
    }

    public function store(Request $request) {
        $rule = [
            'name' => 'required',
            'slug' => 'required',
        ];

        $messages = [
            'name.required' => 'The field <strong>name</strong> is required!',
            'slug.required' => 'The field <strong>name</strong> is required!',
        ];

        $validator = Validator::make($request->all(), $rule, $messages);

        if ($validator->fails()) {
            return redirect()->route('backend.mapel.create')->withErrors($validator)->withInput();
        } else {
            Mapel::create($request->all());
            return redirect()->route('backend.manage.mapel')->with('succes', "The Mapel <strong>{$request->name}</strong> created successfully");
        }
    }

    public function show($id) {
        if ($id == null) {
            return redirect()->route('backend.manage.mapel')->with('error', 'The ID is empty!');
        } else {
            $mapel = Mapel::find($id);

            if ($mapel) {
                return view('backend.mapel.show', compact('mapel'));
            } else {
                return redirect()->route('backend.manage.mapel')->with('error', "#ID {$id} Tidak di Teumkan di Database!");
            }
        }
    }

    public function edit($id) {
        if ($id == null) {
            return redirect()->route('backend.manage.mapel')->with('error', 'The ID is empty!');
        } else {
            $mapel = Mapel::find($id);

            if ($mapel) {
                return view('backend.mapel.edit', compact('mapel'));
            } else {
                return redirect()->route('backend.manage.mapel')->with('error', "#ID {$id} Tidak di Teumkan di Database!");
            }
        }
    }

    public function edit_process(Request $request, Mapel $mapel) {
        $rule = [
            'name' => 'required',
            'slug' => 'required',
        ];

        $messages = [
            'name.required' => 'The field <strong>name</strong> is required!',
            'slug.required' => 'The field <strong>name</strong> is required!',
        ];

        $validator = Validator::make($request->all(), $rule, $messages);

        if ($validator->fails()) {
            return redirect()->route('backend.mapel.edit', $mapel->id)->withErrors($validator)->withInput();
        } else {
            $mapel->update($request->all());
            return redirect()->route('backend.manage.mapel')
                             ->with('success', "The Category <strong>{$request->name}</strong> updated successfully");
        }
    }

    public function destroy($id) {
        $mapel = Mapel::find($id);

        $mapel->delete();

        return redirect()->route('backend.manage.mapel')->with('success', "The Mapel <strong>{$mapel->name}</strong> deleted successfully");
    }
}
