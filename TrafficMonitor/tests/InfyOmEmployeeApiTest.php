<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class InfyOmEmployeeApiTest extends TestCase
{
    use MakeInfyOmEmployeeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateInfyOmEmployee()
    {
        $infyOmEmployee = $this->fakeInfyOmEmployeeData();
        $this->json('POST', '/api/v1/infyOmEmployees', $infyOmEmployee);

        $this->assertApiResponse($infyOmEmployee);
    }

    /**
     * @test
     */
    public function testReadInfyOmEmployee()
    {
        $infyOmEmployee = $this->makeInfyOmEmployee();
        $this->json('GET', '/api/v1/infyOmEmployees/' . $infyOmEmployee->id);

        $this->assertApiResponse($infyOmEmployee->toArray());
    }

    /**
     * @test
     */
    public function testUpdateInfyOmEmployee()
    {
        $infyOmEmployee = $this->makeInfyOmEmployee();
        $editedInfyOmEmployee = $this->fakeInfyOmEmployeeData();

        $this->json('PUT', '/api/v1/infyOmEmployees/' . $infyOmEmployee->id, $editedInfyOmEmployee);

        $this->assertApiResponse($editedInfyOmEmployee);
    }

    /**
     * @test
     */
    public function testDeleteInfyOmEmployee()
    {
        $infyOmEmployee = $this->makeInfyOmEmployee();
        $this->json('DELETE', '/api/v1/infyOmEmployees/' . $infyOmEmployee->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/infyOmEmployees/' . $infyOmEmployee->id);

        $this->assertResponseStatus(404);
    }
}
