<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmployeesController extends Controller
{
    public function all()
    {
        return Employee::all();
    }

    public function get(Employee $employee)
    {
        return $employee;
    }

    public function save(Request $request)
    {
        $employee = Employee::create($request->all());

        return response()->json($employee, Response::HTTP_CREATED);
    }

    public function update(Request $request, Employee $employee)
    {
        $employee->update($request->all());

        return response()->json($employee, Response::HTTP_OK);
    }

    public function delete(Employee $employee)
    {
        $employee->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
