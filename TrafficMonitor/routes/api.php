<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Companies
Route::get('companies', 'CompaniesController@all');
Route::get('companies/{company}', 'CompaniesController@get');
Route::post('companies', 'CompaniesController@save');
Route::put('companies/{company}', 'CompaniesController@update');
Route::delete('companies/{company}', 'CompaniesController@delete');
Route::get('report/{month}', 'CompaniesController@report');


//Employees
Route::get('employees/company/{company}', 'EmployeesController@getEmployeesForCompany');
Route::get('employees', 'EmployeesController@all');
Route::get('employees/{employee}', 'EmployeesController@get');
Route::post('employees', 'EmployeesController@save');
Route::put('employees/{employee}', 'EmployeesController@update');
Route::delete('employees/{employee}', 'EmployeesController@delete');

//Traffics
Route::post('traffics/generate', 'TrafficsController@generate');
