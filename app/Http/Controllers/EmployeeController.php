<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;
// use App\Http\Controllers\EmployeeController;

class EmployeeController extends Controller
{
    //
    
    public function index()
    {
        $employees = Employee::all();

        return view('index', compact('employees'));
    }

    public function createEmp(){
        $department = Department::all();
        return view('emp.employee', compact('department'));
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'emp_name' => 'required',
            'department' => 'required',
            'age' => 'required',
            'salary' => 'required',

        ]);
        // dd($validatedData);

        Employee::create($validatedData);
        return redirect()->back()->with('success', 'Employee data stored successfully!');
    }

    
}
