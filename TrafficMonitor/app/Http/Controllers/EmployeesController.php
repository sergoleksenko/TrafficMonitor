<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmployeesController extends Controller
{
    public function all(Request $request)
    {
        if ($request->input('company') == 'true') {
            return Employee::join('companies', 'employees.company_id', '=', 'companies.id')->
            select('employees.id', 'companies.name as company', 'employees.name', 'employees.email', 'employees.created_at', 'employees.updated_at')->getQuery()->get();
        } else {
            return Employee::all();
        }
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

    public function getEmployeesForCompany(Request $request)
    {
        $employees = Employee::where('company_id', '=', $request->route('company'))->get();

        return response()->json($employees, Response::HTTP_OK);
    }
}
