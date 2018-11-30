<?php

use App\Models\InfyOmCompany;
use App\Repositories\InfyOmCompanyRepository;
use Faker\Factory as Faker;

trait MakeInfyOmCompanyTrait
{
    /**
     * Create fake instance of InfyOmCompany and save it in database
     *
     * @param array $infyOmCompanyFields
     * @return InfyOmCompany
     */
    public function makeInfyOmCompany($infyOmCompanyFields = [])
    {
        /** @var InfyOmCompanyRepository $infyOmCompanyRepo */
        $infyOmCompanyRepo = App::make(InfyOmCompanyRepository::class);
        $theme = $this->fakeInfyOmCompanyData($infyOmCompanyFields);
        return $infyOmCompanyRepo->create($theme);
    }

    /**
     * Get fake data of InfyOmCompany
     *
     * @param array $postFields
     * @return array
     */
    public function fakeInfyOmCompanyData($infyOmCompanyFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'quota' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $infyOmCompanyFields);
    }

    /**
     * Get fake instance of InfyOmCompany
     *
     * @param array $infyOmCompanyFields
     * @return InfyOmCompany
     */
    public function fakeInfyOmCompany($infyOmCompanyFields = [])
    {
        return new InfyOmCompany($this->fakeInfyOmCompanyData($infyOmCompanyFields));
    }
}
