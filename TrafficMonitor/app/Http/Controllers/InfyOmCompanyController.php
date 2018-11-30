<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInfyOmCompanyRequest;
use App\Http\Requests\UpdateInfyOmCompanyRequest;
use App\Repositories\InfyOmCompanyRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class InfyOmCompanyController extends AppBaseController
{
    /** @var  InfyOmCompanyRepository */
    private $infyOmCompanyRepository;

    public function __construct(InfyOmCompanyRepository $infyOmCompanyRepo)
    {
        $this->infyOmCompanyRepository = $infyOmCompanyRepo;
    }

    /**
     * Display a listing of the InfyOmCompany.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->infyOmCompanyRepository->pushCriteria(new RequestCriteria($request));
        $infyOmCompanies = $this->infyOmCompanyRepository->all();

        return view('infy_om_companies.index')
            ->with('infyOmCompanies', $infyOmCompanies);
    }

    /**
     * Show the form for creating a new InfyOmCompany.
     *
     * @return Response
     */
    public function create()
    {
        return view('infy_om_companies.create');
    }

    /**
     * Store a newly created InfyOmCompany in storage.
     *
     * @param CreateInfyOmCompanyRequest $request
     *
     * @return Response
     */
    public function store(CreateInfyOmCompanyRequest $request)
    {
        $input = $request->all();

        $infyOmCompany = $this->infyOmCompanyRepository->create($input);

        Flash::success('Infy Om Company saved successfully.');

        return redirect(route('infyOmCompanies.index'));
    }

    /**
     * Display the specified InfyOmCompany.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $infyOmCompany = $this->infyOmCompanyRepository->findWithoutFail($id);

        if (empty($infyOmCompany)) {
            Flash::error('Infy Om Company not found');

            return redirect(route('infyOmCompanies.index'));
        }

        return view('infy_om_companies.show')->with('infyOmCompany', $infyOmCompany);
    }

    /**
     * Show the form for editing the specified InfyOmCompany.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $infyOmCompany = $this->infyOmCompanyRepository->findWithoutFail($id);

        if (empty($infyOmCompany)) {
            Flash::error('Infy Om Company not found');

            return redirect(route('infyOmCompanies.index'));
        }

        return view('infy_om_companies.edit')->with('infyOmCompany', $infyOmCompany);
    }

    /**
     * Update the specified InfyOmCompany in storage.
     *
     * @param  int $id
     * @param UpdateInfyOmCompanyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInfyOmCompanyRequest $request)
    {
        $infyOmCompany = $this->infyOmCompanyRepository->findWithoutFail($id);

        if (empty($infyOmCompany)) {
            Flash::error('Infy Om Company not found');

            return redirect(route('infyOmCompanies.index'));
        }

        $infyOmCompany = $this->infyOmCompanyRepository->update($request->all(), $id);

        Flash::success('Infy Om Company updated successfully.');

        return redirect(route('infyOmCompanies.index'));
    }

    /**
     * Remove the specified InfyOmCompany from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $infyOmCompany = $this->infyOmCompanyRepository->findWithoutFail($id);

        if (empty($infyOmCompany)) {
            Flash::error('Infy Om Company not found');

            return redirect(route('infyOmCompanies.index'));
        }

        $this->infyOmCompanyRepository->delete($id);

        Flash::success('Infy Om Company deleted successfully.');

        return redirect(route('infyOmCompanies.index'));
    }
}
