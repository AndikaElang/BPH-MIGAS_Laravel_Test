<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = student::orderby('nim', 'desc')->where('status', '=', 'Waiting')->paginate(5);
        return view('admins.index')->with('students', $students);
    }

    /**
     * Update the status in storage to 'Accepted'.
     */
    public function accept(string $id)
    {
        try {
            student::where('nim', $id)->update(['status'=>'Accepted']);
            return redirect()->back()->with('success', 'Successfully Updated');
        } catch (\Exception $e) {
            $failures = $e->failures();
            return redirect()->back()->with('failed', $failures);
        }
    }

    /**
     * Update the status in storage to 'Declined'.
     */
    public function decline(string $id)
    {
        try {
            student::where('nim', $id)->update(['status'=>'Declined']);
            return redirect()->back()->with('success', 'Successfully Updated');
        } catch (\Exception $e) {
            $failures = $e->failures();
            return redirect()->back()->with('failed', $failures);
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
