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
                'email' => 'required'
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
            $employer->save();

            return Redirect::to("login")->withSuccess('Great! You have Successfully logged in');
        }
        elseif ($type == 'student') {
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
                $empid = $user->employer->id;
                $vacancies = Employer::find($empid)->vacancies;
                $employer = Employer::where('id', $empid)->first();
                return view('employers.dashboard', ['employer' => $employer, 'vacancies' => $vacancies]);
            }
            elseif ($user->is_student == true) {
                $studid = $user->student->id;
                $student = Student::where('id', $studid)->first();
                $username = $student->user;
                return view('students.dashboard', ['student' => $student, 'user' => $username]);
            }
        }
        return Redirect::to("login")->withSuccess('Oops! You do not have access');
    }

    public function dashboardStudent() {
        if(Auth::check()) {
            $user = Auth()->user();
            $studid = $user->student->id;
            $student = Student::where('id', $studid);
            return view('students.dashboard', ['student' => $student]);
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
