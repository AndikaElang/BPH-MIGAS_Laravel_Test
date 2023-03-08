<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;

class lecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = student::orderby('nim', 'desc')->where('status', '=', 'Accepted')->paginate(5);
        return view('lecturers.index')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $students = student::where('nim', $id)->first();
        return view('lecturers.edit')->with('students', $students);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'selected_courses' => 'required',
        ], [
            'first_name.required' => 'First name must be filled',
            'last_name.required' => 'Last name must be filled',
            'gender.required' => 'Gender must be filled',
            'selected_courses.required' => 'Course must be filled',
        ]);
        $student = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'selected_courses' => $request->selected_courses,
        ];
        student::where('nim', $id)->update($student);
        return redirect()->to('lecturers')->with('success', 'Successfully update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        student::where('nim', $id)->delete();
        return redirect()->to('lecturers')->with('success', 'Data successfully deleted');
    }
}
