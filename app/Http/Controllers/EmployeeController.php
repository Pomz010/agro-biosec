<?php

namespace App\Http\Controllers;

use App\Models\Respondent;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function store(Request $request){
        $employee = $request->validate([
            'emp_lastname' => ['required', 'string', 'regex:/^[\pL\s\'\-,.]+$/u',],
            'emp_firstname' => ['required', 'string', 'regex:/^[\pL\s\'\-,.]+$/u',],
            'emp_middle_name' => ['required', 'string', 'regex:/^[\pL\s\'\-,.]+$/u',],
            'employee_id' => ['required', 'unique:respondents', 'min:10', 'max:10'],
            'emp_email' => ['nullable', 'email', 'unique'],
            'emp_address' => ['required', 'string', 'min:5', 'max:100'],
            'emp_status' => ['required', 'boolean']
        ]);

        Respondent::create([
            'lastname' => mb_strtolower($employee['emp_lastname']),
            'firstname' =>mb_strtolower($employee['emp_firstname']),
            'middle_name' =>mb_strtolower($employee['emp_middle_name']),
            'employee_id' => mb_strtolower($employee['employee_id']),
            'email' => mb_strtolower($employee['emp_email']),
            'business_unit_address' => mb_strtolower($employee['emp_address']),
            'is_resigned' => mb_strtolower($employee['emp_status'])
        ]);

        // return $employee;
        return redirect()->route('employee.index');
    }
}
