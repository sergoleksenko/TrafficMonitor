<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Traffic;
use Faker\Factory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class TrafficsController extends Controller
{
    public function generate()
    {
        $faker = Factory::create();
        $current_date = date('Y-m-d');
        $past_date = date('Y-m-d', strtotime($current_date . '-6 months'));
        $employees = Employee::all();

        while ($past_date <= $current_date) {
            foreach ($employees as $employee) {
                for ($i = 0; $i < rand(0, 5); $i++) {
                    //currently bytes_amount is from 100 bytes to 10 Tb
                    Traffic::create([
                        'employee_id' => $employee['id'],
                        'resource' => $faker->url,
                        'bytes_amount' => rand(100, 10995116277760),
                        'created_at' => $past_date,
                        'updated_at' => $past_date
                    ]);
                }
            }
            $past_date = date('Y-m-d', strtotime($past_date . '+' . rand(3, 5) . 'days'));
        }

        return response(null, Response::HTTP_ACCEPTED);
    }

    public function report($month)
    {
        $report = Traffic::join('employees', 'traffics.employee_id', '=', 'employees.id')->join('companies', 'employees.company_id', '=', 'companies.id')->
        select('employees.company_id', 'companies.name', 'companies.quota', DB::raw('SUM(traffics.bytes_amount) / 1099511627776 as used'))->
        whereMonth('traffics.created_at', $month)->groupBy('employees.company_id', 'companies.name', 'companies.quota')->getQuery()->get();

        for ($i = 0; $i < count($report); $i++) {
            if (((array)$report[$i])['used'] > ((array)$report[$i])['quota']) {
                $final_report[] = $report[$i];
            }
        }

        if (!isset($final_report)) {
            $final_report = 'There are no data.';
        }

        return response()->json($final_report, Response::HTTP_OK);
    }
}
