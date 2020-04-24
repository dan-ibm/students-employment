<?php

namespace App\Http\Controllers;

use App\Employer;
use Illuminate\Http\Request;
use Session;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $userid = Session::get('user_id');
        $employer = Employer::where('user_id', $userid)->first();
        $vacancies = $employer->vacancies;
        return view('employers.dashboard', ['employer' => $employer, 'vacancies' => $vacancies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('employers.create');
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
        $request->validate([
            'org_name' => 'required',
            'position' => 'required',
            'title' => 'required',
            'requirements' => 'required',
            'category' => 'required',
            'min_salary' => 'required'
        ]);

        $employer = new Employer([
            'org_name' => $request->get('org_name'),
            'position' => $request->get('position'),
            'title' => $request->get('title'),
            'requirements' => $request->get('requirements'),
            'category' => $request->get('category'),
            'min_salary' => $request->get('min_salary')

        ]);
        $employer->save();
        return redirect('/employers')->with('success', 'Employer Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $userid = Session::get('user_id');
        $employer = Employer::where('user_id', $userid)->first();
        $vacancies = $employer->vacancies;
        return view('employers.dashboard', ['employer' => $employer, 'vacancies' => $vacancies]);
    }
/**
    function showById($id) {
        $employer = Employer::find($id);
        return view('employers.show', compact('employer'));
    }
*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $employer = Employer::find($id);
        return view('employers.edit', compact('employer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'org_name'=>'required',
            'email'=>'required',
            'username'=>'required',
            'password'=>'required'
        ]);

        $employer = Employer::find($id);
        $employer->org_name =  $request->get('org_name');
        $employer->email = $request->get('email');
        $employer->save();

        return redirect('/employers/dashboard')->with('success', 'Employer updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $employer = Employer::find($id);
        $employer->delete();

        return redirect('/employers')->with('success', 'Employer deleted!');
    }
}
