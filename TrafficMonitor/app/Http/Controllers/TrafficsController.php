<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Traffic;
use Faker\Factory;
use Illuminate\Http\Response;

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
}
