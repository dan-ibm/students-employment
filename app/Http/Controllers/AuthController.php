<?php

namespace App\Http\Controllers;

use App\Http\Middleware\EncryptCookies;
use App\Student;
use App\Vacancy;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
Use App\User;
Use App\Employer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class AuthController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function postLogin(Request $request)
    {
        request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $user = Auth()->user();
            $stud = $user->is_student;
            $id = $user->id;
            Session::put('user_id', $id);
            Session::put('username', $user->username);
            Session::put('isStudent', $user->is_student);

            if ($stud == true) {
                //route('dashboard', 'students');
                return redirect()->intended('students/dashboard');
            }
            elseif ($stud == false)
                return redirect()->intended('employers/dashboard');
        }
        return Redirect::to("login")->withSuccess('Oops! You have entered invalid credentials');
    }

    public function postRegistration($type, Request $request)
    {
        if ($type == 'employer') {
            request()->validate([
                'username' => 'required|unique:users',
                //'contact_number' => 'required|contact_number|unique:users',
                'password' => 'required|min:6',
                'org_name' => 'required',
                'email' => 'required',
                'phone' => 'required'
            ]);

            $data = $request->all();

            $user = new User;
            $user->username = $data['username'];
            $user->password = Hash::make($data['password']);
            $user->is_student = false;
            $user->save();
            $employer = new Employer;
            $employer->org_name = $data['org_name'];
            $employer->user_id = $user->id;
            $employer->email = $data['email'];
            $employer->phone = $data['phone'];
            $employer->save();

            return Redirect::to("login")->withSuccess('Great! You have Successfully logged in');
        }
        elseif ($type == 'student') {
            request()->validate([
                'username' => 'required|unique:users',
                //'contact_number' => 'required|contact_number|unique:users',
                'password' => 'required|min:6',
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'status' => 'required'
            ]);
            $data = $request->all();

            $user = new User;
            $user->username = $data['username'];
            $user->password = Hash::make($data['password']);
            $user->is_student = true;
            $user->save();

            $student = new Student;
            $student->first_name = $data['first_name'];
            $student->last_name = $data['last_name'];
            $student->email = $data['email'];
            $student->phone = $data['phone'];
            $student->status = $data['status'];
            $student->resume = $data['resume'];
            $student->user_id = $user->id;
            $student->save();

            return Redirect::to("login")->withSuccess('Great! You have Successfully logged in');

        }
    }

    public function dashboard()
    {

        if(Auth::check()){
            $user = Auth()->user();
            if ($user->is_student == false) {
                return Redirect::to("employers/dashboard")->withSuccess('Oops! You do not have access');
            }
            elseif ($user->is_student == true) {
                return Redirect::to("students/dashboard")->withSuccess('Oops! You do not have access');
            }
        }
        return Redirect::to("login")->withSuccess('Oops! You do not have access');
    }


/*
    public function create(array $data)
    {
        //Employer::create([]);

        $user = new User;
        $user->username = $data['username'];
        $user->password = Hash::make($data['password']);
        $user->save();

        return $user;

        return User::create([
            'is_student' => '0',
            'org_name' => $data['org_name'],
            'username' => $data['username'],
            'password' => Hash::make($data['password'])
        ]);

    }
    */

    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
