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
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

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
            $user->email = $data['email'];
            $user->is_student = false;
            $user->save();
            $employer = new Employer;
            $employer->org_name = $data['org_name'];
            $employer->user_id = $user->id;
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
            $user->email = $data['email'];
            $user->is_student = true;
            $user->save();

            $student = new Student;
            $student->first_name = $data['first_name'];
            $student->last_name = $data['last_name'];
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

    public function reset()
    {
        return view('auth.resetMail');
    }

    public function postReset(Request $request)
    {
        $this->validate($request, [
           'email'=> 'required|email'
        ]);

        //$username = session()->get('user_name');
        $email = $request->email;
        $user = User::where('email', $email)->first();
        if ($user != null) {



            //generate random token with 6 digits
            $a = null;
            for ($i = 0; $i<6; $i++)
            {
                $a .= mt_rand(0,9);
            }

            $data = array(
                'email' => $request->email,
                'code' => $a
            );

            //saving new token
            $user->remember_token = $a;
            $user->save();

            Mail::to($data['email'])->send(new SendMail($data, 'Reset Password'));
            Session::put('email', $data['email']);
            return view('auth.resetCode', compact('data'));
        }
        else {
            return view('layouts.error')->with('error', 'Email does not exists. Try again!');
        }
    }

    public function checkReset(Request $request)
    {
        $this->validate($request, [
            'code'=> 'required'
        ]);
        $code = $request->code;
        $email = Session::get('email');
        $user = User::where('email', $email)->first();
        if ($user->remember_token == $code)
        {
            return view('auth.resetPassword');
        }
        else {
            return view('layouts.error')->with('error', 'Code is not correct. Try again');
        }

    }

    public function successReset(Request $request)
    {
        $this->validate($request, [
            'password'=> 'required',
            'confirmPassword'=> 'required'
        ]);
        $email = Session::get('email');
        $user = User::where('email', $email)->first();
        $password = $request->password;
        $confirmPassword = $request->confirmPassword;
        if ($password == $confirmPassword)
        {
            $user->password = Hash::make($password);
            $user->remember_token = null;
            $user->save();

            return view('auth.login')->with('success', 'SUCCESSFUL!!!');
        }
        else {
            return view('auth.resetPassword')->with('success', 'BAAAD');
        }
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
