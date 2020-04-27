<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Session;
use PDF;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid = Session::get('user_id');
        $student = Student::where('user_id', $userid)->first();
        $vacancies = $student->vacancies;
        $username = $student->user;

        return view('students.dashboard', [
            'student' => $student, 
            'user' => $username,
            'vacancies' => $vacancies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $student = Student::where('id', $id)->first();
        $vacancies = $student->vacancies;
        return view('students.show', [
            'student' => $student,
            'vacancies' => $vacancies
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }

    public function generatePDF()
    {
        $data = ['student' => Student::where('id', 2)->first()];

        $pdf = PDF::loadView('students.resume', $data);

        $file = $pdf->download('student.pdf');

        $student1 = Student::where('id', 2)->first();
        $student1->resume = $file;
        $student1->save();
        return $file;

    }

    public function showAll(Student $student)
    {
        //
        if (Session::get('role') == 'teacher' || Session::get('role') == 'employer') {
            $students = $student::all();
            return view('students.showAll', compact('students'));
        }
        else {
            return view('layouts.error')->with('error', 'You have not enough permissions.');
        }
    }
}
