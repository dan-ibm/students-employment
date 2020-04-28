<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\Student;
use Illuminate\Http\Request;
use Session;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid = Session::get('user_id');
        $teacher = Teacher::where('user_id', $userid)->first();
        $username = $teacher->user;
        return view('teachers.dashboard', [
            'teacher' => $teacher, 
            'user' => $username]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Session::get('teacher_id'))
        return view('teachers.grade');
        else
        return view('layouts.error')->with('error', 'You are not a teacher!');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postgrade(Request $request, $studid, $teacherid)
    {
        request()->validate([
            'grade' => 'required',
            'comment' => ''
        ]);

        $data = $request->all();

        $teacher = Teacher::where('id', $teacherid)->first();
        $teacher->students()->attach($studid, [
            'grade' => $data['grade'],
            'comment' => $data['comment']]);
        return redirect('/')->with('success', 'Teacher Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}
