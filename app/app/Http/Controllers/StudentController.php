<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Session;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid = session()->get('user_id');
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
        $grades_arr = [];
        $grades_count = count(json_decode($student->teachers, true));
        if ($grades_count != 0) {
            foreach($student->teachers as $teacher) {
                $grades_arr[] = $teacher->pivot->grade;
            }

            $grades = array_sum($grades_arr)/$grades_count;
        }
        else {
            $grades = 0;
        }

        



        $vacancies = $student->vacancies;
        return view('students.show', [
            'student' => $student,
            'vacancies' => $vacancies,
            'grades' => round($grades, 2)
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


    public function showAll(Student $student)
    {
        //
        if (session()->get('role') == 'teacher' || session()->get('role') == 'employer') {
            $students = $student::all();
            return view('students.showAll', compact('students'));
        }
        else {
            return view('layouts.error')->with('error', 'You have not enough permissions.');
        }
    }
}
