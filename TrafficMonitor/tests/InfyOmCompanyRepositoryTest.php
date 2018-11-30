<?php

use App\Models\InfyOmCompany;
use App\Repositories\InfyOmCompanyRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InfyOmCompanyRepositoryTest extends TestCase
{
    use MakeInfyOmCompanyTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var InfyOmCompanyRepository
     */
    protected $infyOmCompanyRepo;

    public function setUp()
    {
        parent::setUp();
        $this->infyOmCompanyRepo = App::make(InfyOmCompanyRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateInfyOmCompany()
    {
        $infyOmCompany = $this->fakeInfyOmCompanyData();
        $createdInfyOmCompany = $this->infyOmCompanyRepo->create($infyOmCompany);
        $createdInfyOmCompany = $createdInfyOmCompany->toArray();
        $this->assertArrayHasKey('id', $createdInfyOmCompany);
        $this->assertNotNull($createdInfyOmCompany['id'], 'Created InfyOmCompany must have id specified');
        $this->assertNotNull(InfyOmCompany::find($createdInfyOmCompany['id']), 'InfyOmCompany with given id must be in DB');
        $this->assertModelData($infyOmCompany, $createdInfyOmCompany);
    }

    /**
     * @test read
     */
    public function testReadInfyOmCompany()
    {
        $infyOmCompany = $this->makeInfyOmCompany();
        $dbInfyOmCompany = $this->infyOmCompanyRepo->find($infyOmCompany->id);
        $dbInfyOmCompany = $dbInfyOmCompany->toArray();
        $this->assertModelData($infyOmCompany->toArray(), $dbInfyOmCompany);
    }

    /**
     * @test update
     */
    public function testUpdateInfyOmCompany()
    {
        $infyOmCompany = $this->makeInfyOmCompany();
        $fakeInfyOmCompany = $this->fakeInfyOmCompanyData();
        $updatedInfyOmCompany = $this->infyOmCompanyRepo->update($fakeInfyOmCompany, $infyOmCompany->id);
        $this->assertModelData($fakeInfyOmCompany, $updatedInfyOmCompany->toArray());
        $dbInfyOmCompany = $this->infyOmCompanyRepo->find($infyOmCompany->id);
        $this->assertModelData($fakeInfyOmCompany, $dbInfyOmCompany->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteInfyOmCompany()
    {
        $infyOmCompany = $this->makeInfyOmCompany();
        $resp = $this->infyOmCompanyRepo->delete($infyOmCompany->id);
        $this->assertTrue($resp);
        $this->assertNull(InfyOmCompany::find($infyOmCompany->id), 'InfyOmCompany should not exist in DB');
    }
}
