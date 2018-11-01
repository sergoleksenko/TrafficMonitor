<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
}
