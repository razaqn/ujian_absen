<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::orderBy('id',)->get();
        return view('backend.user.index', compact('users'));
    }

    public function create()
    {
        return view('backend.user.create');
    }

    public function create_process(Request $request)
    {
        $rule = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ];  

        $message =[
            'nama.required' => 'The Field <strong>name</strong> is required!',
            'email.required' => 'The Field <strong>email</strong> is required!',
            'password.required' => 'The Field <strong>password</strong> is required!',
        ];  

        $validator = Validator::make($request->all(), $rule, $message);

        if ($validator->fails()) {
            return redirect()->route('backend.create.user')->withErrors($validator)->withInput();
        } else {
            ServicesCategories::create($request->all());
            return redirect()->route('backend.create.user')->with('success', "The Category <strong>{$request->name}</strong> created successfully");
        }
    }

    public function edit($id = null){
        if ($id == null){
            return redirect()->route('backend.manage.services.c')->with('error', "the ID is empty");
        } else{
            $item = ServicesCategories::find($id);
            return view('backend.services.edit_c', compact('item'));
        }
    }

    public function edit_process(Request $request)
    {
        request()->validate([
            'name'  => 'required',
            'slug'  => 'required'
        ]);

        ServicesCategories::where('id', $request->id)->update(([
            'name'  => $request->name,
            'slug'  => $request->slug
        ]));

        return redirect()->route('backend.manage.services.c')->with('success', 'Item Edited Successfully');
    }

    public function destroy($id){
        $item = ServicesCategories::find($id);

        $item->delete();

        return redirect()->route('backend.manage.services.c')->with('success', 'Item deleted successfully');
    }
}
