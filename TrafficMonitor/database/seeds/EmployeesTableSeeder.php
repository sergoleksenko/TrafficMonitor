<?php

use App\Company;
use App\Employee;
use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $ids = Company::pluck('id')->toArray();

        foreach ($ids as $id) {
            for ($i = 0; $i < $faker->numberBetween(20, 100); $i++) {
                Employee::create([
                    'company_id' => $id,
                    'name' => $faker->unique()->name,
                    'email' => $faker->unique()->email
                ]);
            }
        }
    }
}
