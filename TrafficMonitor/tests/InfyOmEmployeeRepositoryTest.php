<?php

use App\Models\InfyOmEmployee;
use App\Repositories\InfyOmEmployeeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InfyOmEmployeeRepositoryTest extends TestCase
{
    use MakeInfyOmEmployeeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var InfyOmEmployeeRepository
     */
    protected $infyOmEmployeeRepo;

    public function setUp()
    {
        parent::setUp();
        $this->infyOmEmployeeRepo = App::make(InfyOmEmployeeRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateInfyOmEmployee()
    {
        $infyOmEmployee = $this->fakeInfyOmEmployeeData();
        $createdInfyOmEmployee = $this->infyOmEmployeeRepo->create($infyOmEmployee);
        $createdInfyOmEmployee = $createdInfyOmEmployee->toArray();
        $this->assertArrayHasKey('id', $createdInfyOmEmployee);
        $this->assertNotNull($createdInfyOmEmployee['id'], 'Created InfyOmEmployee must have id specified');
        $this->assertNotNull(InfyOmEmployee::find($createdInfyOmEmployee['id']), 'InfyOmEmployee with given id must be in DB');
        $this->assertModelData($infyOmEmployee, $createdInfyOmEmployee);
    }

    /**
     * @test read
     */
    public function testReadInfyOmEmployee()
    {
        $infyOmEmployee = $this->makeInfyOmEmployee();
        $dbInfyOmEmployee = $this->infyOmEmployeeRepo->find($infyOmEmployee->id);
        $dbInfyOmEmployee = $dbInfyOmEmployee->toArray();
        $this->assertModelData($infyOmEmployee->toArray(), $dbInfyOmEmployee);
    }

    /**
     * @test update
     */
    public function testUpdateInfyOmEmployee()
    {
        $infyOmEmployee = $this->makeInfyOmEmployee();
        $fakeInfyOmEmployee = $this->fakeInfyOmEmployeeData();
        $updatedInfyOmEmployee = $this->infyOmEmployeeRepo->update($fakeInfyOmEmployee, $infyOmEmployee->id);
        $this->assertModelData($fakeInfyOmEmployee, $updatedInfyOmEmployee->toArray());
        $dbInfyOmEmployee = $this->infyOmEmployeeRepo->find($infyOmEmployee->id);
        $this->assertModelData($fakeInfyOmEmployee, $dbInfyOmEmployee->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteInfyOmEmployee()
    {
        $infyOmEmployee = $this->makeInfyOmEmployee();
        $resp = $this->infyOmEmployeeRepo->delete($infyOmEmployee->id);
        $this->assertTrue($resp);
        $this->assertNull(InfyOmEmployee::find($infyOmEmployee->id), 'InfyOmEmployee should not exist in DB');
    }
}
