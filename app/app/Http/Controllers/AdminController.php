<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;

class AdminController extends Controller
{
    public function index() {
        if (Session::get('username') == 'admin') {
            return view('admin.dashboard');
            //return view('layouts.error')->with('error', 'Admin root are not given');
        }
        else {
            return view('layouts.error')->with('error', 'Admin root are not given');
        }
    }

    public function create() {
        if (Session::get('username') == 'admin')
        return view('admin.create');
        else
        return view('layouts.error')->with('error', 'You are not admin!');
    }

    public function store(Request $request)
    {
        //
        request()->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);

        $data = $request->all();

        $user = new User;
        $user->username = $data['username'];
        $user->password = Hash::make($data['password']);
        $user->email = $data['email'];
        $user->role = "teacher";
        $user->save();
        $teacher = new Teacher;
        $teacher->first_name = $data['first_name'];
        $teacher->last_name = $data['last_name'];
        $teacher->user_id = $user->id;
        $teacher->phone = $data['phone'];
        $teacher->save();
        return redirect('/')->with('success', 'Teacher Saved');
    }

    
}
