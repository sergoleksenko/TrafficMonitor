<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class InfyOmCompanyApiTest extends TestCase
{
    use MakeInfyOmCompanyTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateInfyOmCompany()
    {
        $infyOmCompany = $this->fakeInfyOmCompanyData();
        $this->json('POST', '/api/v1/infyOmCompanies', $infyOmCompany);

        $this->assertApiResponse($infyOmCompany);
    }

    /**
     * @test
     */
    public function testReadInfyOmCompany()
    {
        $infyOmCompany = $this->makeInfyOmCompany();
        $this->json('GET', '/api/v1/infyOmCompanies/' . $infyOmCompany->id);

        $this->assertApiResponse($infyOmCompany->toArray());
    }

    /**
     * @test
     */
    public function testUpdateInfyOmCompany()
    {
        $infyOmCompany = $this->makeInfyOmCompany();
        $editedInfyOmCompany = $this->fakeInfyOmCompanyData();

        $this->json('PUT', '/api/v1/infyOmCompanies/' . $infyOmCompany->id, $editedInfyOmCompany);

        $this->assertApiResponse($editedInfyOmCompany);
    }

    /**
     * @test
     */
    public function testDeleteInfyOmCompany()
    {
        $infyOmCompany = $this->makeInfyOmCompany();
        $this->json('DELETE', '/api/v1/infyOmCompanies/' . $infyOmCompany->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/infyOmCompanies/' . $infyOmCompany->id);

        $this->assertResponseStatus(404);
    }
}
