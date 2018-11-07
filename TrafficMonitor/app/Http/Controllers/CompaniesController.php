<?php

namespace App\Http\Controllers;

use App\Company;
use App\Traffic;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class CompaniesController extends Controller
{
    public function all()
    {
        return Company::all();
    }

    public function get(Company $company)
    {
        return $company;
    }

    public function save(Request $request)
    {
        $company = Company::create($request->all());

        return response()->json($company, Response::HTTP_CREATED);
    }

    public function update(Request $request, Company $company)
    {
        $company->update($request->all());

        return response()->json($company, Response::HTTP_OK);
    }

    public function delete(Company $company)
    {
        $company->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    public function report($month)
    {
        $traffics = Traffic::join('employees', 'traffics.employee_id', '=', 'employees.id')->join('companies', 'employees.company_id', '=', 'companies.id')->
        select('employees.company_id', 'companies.name', 'companies.quota', DB::raw('SUM(traffics.bytes_amount) / 1099511627776 as used'))->
        whereMonth('traffics.created_at', $month)->groupBy('employees.company_id', 'companies.name', 'companies.quota')->getQuery()->get();

        $report = [];

        foreach ($traffics as $traffic) {
            if (((array)$traffic)['used'] > ((array)$traffic)['quota']) {
                $report[] = $traffic;
            }
        }

        return response()->json($report, Response::HTTP_OK);
    }
}
