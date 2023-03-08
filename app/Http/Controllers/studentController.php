<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = student::orderby('nim', 'desc')->where('status', '=', 'Accepted')->orwhere('status', '=', 'Declined')->paginate(5);
        return view('students.index')->with('students', $students);
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
        $request->validate([
            'excel_file'=>'required|mimes:xlsx'
        ]);

        // try {
        Excel::import(new UsersImport, $request->file('excel_file'));
        return redirect()->back()->with('success', 'Successfully imported!');
        // } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
        //     $failures = $e->failures();
        //     return redirect()->back()->with('import_errors', $failures);
             
            // // foreach ($failures as $failure) {
            // //     $failure->row(); // row that went wrong
            // //     $failure->attribute(); // either heading key (if using heading row concern) or column index
            // //     $failure->errors(); // Actual error messages from Laravel validator
            // //     $failure->values(); // The values of the row that has failed.
            // }
        // }
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
