<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\CreateInfyOmCompanyAPIRequest;
use App\Http\Requests\API\UpdateInfyOmCompanyAPIRequest;
use App\Models\InfyOmCompany;
use App\Repositories\InfyOmCompanyRepository;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class InfyOmCompanyController
 * @package App\Http\Controllers\API
 */
class InfyOmCompanyAPIController extends AppBaseController
{
    /** @var  InfyOmCompanyRepository */
    private $infyOmCompanyRepository;

    public function __construct(InfyOmCompanyRepository $infyOmCompanyRepo)
    {
        $this->infyOmCompanyRepository = $infyOmCompanyRepo;
    }

    /**
     * Display a listing of the InfyOmCompany.
     * GET|HEAD /infyOmCompanies
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->infyOmCompanyRepository->pushCriteria(new RequestCriteria($request));
        $this->infyOmCompanyRepository->pushCriteria(new LimitOffsetCriteria($request));
        $infyOmCompanies = $this->infyOmCompanyRepository->all();

        return $this->sendResponse($infyOmCompanies->toArray(), 'Infy Om Companies retrieved successfully');
    }

    /**
     * Store a newly created InfyOmCompany in storage.
     * POST /infyOmCompanies
     *
     * @param CreateInfyOmCompanyAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateInfyOmCompanyAPIRequest $request)
    {
        $input = $request->all();

        $infyOmCompanies = $this->infyOmCompanyRepository->create($input);

        return $this->sendResponse($infyOmCompanies->toArray(), 'Infy Om Company saved successfully');
    }

    /**
     * Display the specified InfyOmCompany.
     * GET|HEAD /infyOmCompanies/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var InfyOmCompany $infyOmCompany */
        $infyOmCompany = $this->infyOmCompanyRepository->findWithoutFail($id);

        if (empty($infyOmCompany)) {
            return $this->sendError('Infy Om Company not found');
        }

        return $this->sendResponse($infyOmCompany->toArray(), 'Infy Om Company retrieved successfully');
    }

    /**
     * Update the specified InfyOmCompany in storage.
     * PUT/PATCH /infyOmCompanies/{id}
     *
     * @param  int $id
     * @param UpdateInfyOmCompanyAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInfyOmCompanyAPIRequest $request)
    {
        $input = $request->all();

        /** @var InfyOmCompany $infyOmCompany */
        $infyOmCompany = $this->infyOmCompanyRepository->findWithoutFail($id);

        if (empty($infyOmCompany)) {
            return $this->sendError('Infy Om Company not found');
        }

        $infyOmCompany = $this->infyOmCompanyRepository->update($input, $id);

        return $this->sendResponse($infyOmCompany->toArray(), 'InfyOmCompany updated successfully');
    }

    /**
     * Remove the specified InfyOmCompany from storage.
     * DELETE /infyOmCompanies/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var InfyOmCompany $infyOmCompany */
        $infyOmCompany = $this->infyOmCompanyRepository->findWithoutFail($id);

        if (empty($infyOmCompany)) {
            return $this->sendError('Infy Om Company not found');
        }

        $infyOmCompany->delete();

        return $this->sendResponse($id, 'Infy Om Company deleted successfully');
    }
}
