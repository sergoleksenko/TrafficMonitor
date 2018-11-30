<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInfyOmEmployeeRequest;
use App\Http\Requests\UpdateInfyOmEmployeeRequest;
use App\Repositories\InfyOmEmployeeRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class InfyOmEmployeeController extends AppBaseController
{
    /** @var  InfyOmEmployeeRepository */
    private $infyOmEmployeeRepository;

    public function __construct(InfyOmEmployeeRepository $infyOmEmployeeRepo)
    {
        $this->infyOmEmployeeRepository = $infyOmEmployeeRepo;
    }

    /**
     * Display a listing of the InfyOmEmployee.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->infyOmEmployeeRepository->pushCriteria(new RequestCriteria($request));
        $infyOmEmployees = $this->infyOmEmployeeRepository->all();

        return view('infy_om_employees.index')
            ->with('infyOmEmployees', $infyOmEmployees);
    }

    /**
     * Show the form for creating a new InfyOmEmployee.
     *
     * @return Response
     */
    public function create()
    {
        return view('infy_om_employees.create');
    }

    /**
     * Store a newly created InfyOmEmployee in storage.
     *
     * @param CreateInfyOmEmployeeRequest $request
     *
     * @return Response
     */
    public function store(CreateInfyOmEmployeeRequest $request)
    {
        $input = $request->all();

        $infyOmEmployee = $this->infyOmEmployeeRepository->create($input);

        Flash::success('Infy Om Employee saved successfully.');

        return redirect(route('infyOmEmployees.index'));
    }

    /**
     * Display the specified InfyOmEmployee.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $infyOmEmployee = $this->infyOmEmployeeRepository->findWithoutFail($id);

        if (empty($infyOmEmployee)) {
            Flash::error('Infy Om Employee not found');

            return redirect(route('infyOmEmployees.index'));
        }

        return view('infy_om_employees.show')->with('infyOmEmployee', $infyOmEmployee);
    }

    /**
     * Show the form for editing the specified InfyOmEmployee.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $infyOmEmployee = $this->infyOmEmployeeRepository->findWithoutFail($id);

        if (empty($infyOmEmployee)) {
            Flash::error('Infy Om Employee not found');

            return redirect(route('infyOmEmployees.index'));
        }

        return view('infy_om_employees.edit')->with('infyOmEmployee', $infyOmEmployee);
    }

    /**
     * Update the specified InfyOmEmployee in storage.
     *
     * @param  int $id
     * @param UpdateInfyOmEmployeeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInfyOmEmployeeRequest $request)
    {
        $infyOmEmployee = $this->infyOmEmployeeRepository->findWithoutFail($id);

        if (empty($infyOmEmployee)) {
            Flash::error('Infy Om Employee not found');

            return redirect(route('infyOmEmployees.index'));
        }

        $infyOmEmployee = $this->infyOmEmployeeRepository->update($request->all(), $id);

        Flash::success('Infy Om Employee updated successfully.');

        return redirect(route('infyOmEmployees.index'));
    }

    /**
     * Remove the specified InfyOmEmployee from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $infyOmEmployee = $this->infyOmEmployeeRepository->findWithoutFail($id);

        if (empty($infyOmEmployee)) {
            Flash::error('Infy Om Employee not found');

            return redirect(route('infyOmEmployees.index'));
        }

        $this->infyOmEmployeeRepository->delete($id);

        Flash::success('Infy Om Employee deleted successfully.');

        return redirect(route('infyOmEmployees.index'));
    }
}
