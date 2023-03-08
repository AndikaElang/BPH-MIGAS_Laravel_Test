<?php

namespace App\Imports;

use App\Models\student;
use Maatwebsite\Excel\Concerns\ToModel;
// use Maatwebsite\Excel\Concerns\WithHeadingRow;
// use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new student([
           'nim'                  => $row[0],
           'first_name'           => $row[1], 
           'last_name'            => $row[2],
           'gender'               => $row[3],
           'selected_courses'     => $row[4],
           'status'               => $row[5],
        ]);
    }

    // public function rules(): array
    // {
    //     return [
    //         'nim' =>'required|nim|unique:students',
    //          // Above is alias for as it always validates in batches
    //          '*.nim' => 'required|nim|unique:students',

    //          'first_name' =>'required',
    //          // Above is alias for as it always validates in batches
    //          '*.first_name' => 'required',

    //          'gender' =>'required',
    //          // Above is alias for as it always validates in batches
    //          '*.gender' => 'required',

    //          'selected_courses' =>'required',
    //          // Above is alias for as it always validates in batches
    //          '*.selected_courses' => 'required',
    //     ];
    // }
}
