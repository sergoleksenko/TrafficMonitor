<?php

use App\Models\InfyOmEmployee;
use App\Repositories\InfyOmEmployeeRepository;
use Faker\Factory as Faker;

trait MakeInfyOmEmployeeTrait
{
    /**
     * Create fake instance of InfyOmEmployee and save it in database
     *
     * @param array $infyOmEmployeeFields
     * @return InfyOmEmployee
     */
    public function makeInfyOmEmployee($infyOmEmployeeFields = [])
    {
        /** @var InfyOmEmployeeRepository $infyOmEmployeeRepo */
        $infyOmEmployeeRepo = App::make(InfyOmEmployeeRepository::class);
        $theme = $this->fakeInfyOmEmployeeData($infyOmEmployeeFields);
        return $infyOmEmployeeRepo->create($theme);
    }

    /**
     * Get fake data of InfyOmEmployee
     *
     * @param array $postFields
     * @return array
     */
    public function fakeInfyOmEmployeeData($infyOmEmployeeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'company_id' => $fake->randomDigitNotNull,
            'name' => $fake->word,
            'email' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $infyOmEmployeeFields);
    }

    /**
     * Get fake instance of InfyOmEmployee
     *
     * @param array $infyOmEmployeeFields
     * @return InfyOmEmployee
     */
    public function fakeInfyOmEmployee($infyOmEmployeeFields = [])
    {
        return new InfyOmEmployee($this->fakeInfyOmEmployeeData($infyOmEmployeeFields));
    }
}
