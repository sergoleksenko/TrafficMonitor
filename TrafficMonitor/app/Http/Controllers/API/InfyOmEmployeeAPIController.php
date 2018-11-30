<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\CreateInfyOmEmployeeAPIRequest;
use App\Http\Requests\API\UpdateInfyOmEmployeeAPIRequest;
use App\Models\InfyOmEmployee;
use App\Repositories\InfyOmEmployeeRepository;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class InfyOmEmployeeController
 * @package App\Http\Controllers\API
 */
class InfyOmEmployeeAPIController extends AppBaseController
{
    /** @var  InfyOmEmployeeRepository */
    private $infyOmEmployeeRepository;

    public function __construct(InfyOmEmployeeRepository $infyOmEmployeeRepo)
    {
        $this->infyOmEmployeeRepository = $infyOmEmployeeRepo;
    }

    /**
     * Display a listing of the InfyOmEmployee.
     * GET|HEAD /infyOmEmployees
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->infyOmEmployeeRepository->pushCriteria(new RequestCriteria($request));
        $this->infyOmEmployeeRepository->pushCriteria(new LimitOffsetCriteria($request));
        $infyOmEmployees = $this->infyOmEmployeeRepository->all();

        return $this->sendResponse($infyOmEmployees->toArray(), 'Infy Om Employees retrieved successfully');
    }

    /**
     * Store a newly created InfyOmEmployee in storage.
     * POST /infyOmEmployees
     *
     * @param CreateInfyOmEmployeeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateInfyOmEmployeeAPIRequest $request)
    {
        $input = $request->all();

        $infyOmEmployees = $this->infyOmEmployeeRepository->create($input);

        return $this->sendResponse($infyOmEmployees->toArray(), 'Infy Om Employee saved successfully');
    }

    /**
     * Display the specified InfyOmEmployee.
     * GET|HEAD /infyOmEmployees/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var InfyOmEmployee $infyOmEmployee */
        $infyOmEmployee = $this->infyOmEmployeeRepository->findWithoutFail($id);

        if (empty($infyOmEmployee)) {
            return $this->sendError('Infy Om Employee not found');
        }

        return $this->sendResponse($infyOmEmployee->toArray(), 'Infy Om Employee retrieved successfully');
    }

    /**
     * Update the specified InfyOmEmployee in storage.
     * PUT/PATCH /infyOmEmployees/{id}
     *
     * @param  int $id
     * @param UpdateInfyOmEmployeeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInfyOmEmployeeAPIRequest $request)
    {
        $input = $request->all();

        /** @var InfyOmEmployee $infyOmEmployee */
        $infyOmEmployee = $this->infyOmEmployeeRepository->findWithoutFail($id);

        if (empty($infyOmEmployee)) {
            return $this->sendError('Infy Om Employee not found');
        }

        $infyOmEmployee = $this->infyOmEmployeeRepository->update($input, $id);

        return $this->sendResponse($infyOmEmployee->toArray(), 'InfyOmEmployee updated successfully');
    }

    /**
     * Remove the specified InfyOmEmployee from storage.
     * DELETE /infyOmEmployees/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var InfyOmEmployee $infyOmEmployee */
        $infyOmEmployee = $this->infyOmEmployeeRepository->findWithoutFail($id);

        if (empty($infyOmEmployee)) {
            return $this->sendError('Infy Om Employee not found');
        }

        $infyOmEmployee->delete();

        return $this->sendResponse($id, 'Infy Om Employee deleted successfully');
    }
}
