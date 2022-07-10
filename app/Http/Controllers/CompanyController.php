<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\CompanyRequest;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('role_based_authorization');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = (new Company)->fetchListWithPagination();
        return view('company.list', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $data = $request->all();
        if (isset($data['logo']) && !empty($data['logo'])) {
            $data['logo'] = request()->file('logo')->store('logo_' . time() . '_' . $request->input('name'), 'public');
        }
        Company::createCompany($data);
        return redirect(route('company.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::showCompany($id);
        return view('company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::showCompany($id);
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        $data = $request->all();
        if (isset($data['logo']) && !empty($data['logo'])) {
            $data['logo'] = request()->file('logo')->store('logo_' . time() . '_' . $request->input('name'), 'public');
        }
        Company::updateCompany($data, $id);
        return redirect(route('company.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::destroyCompany($id);
        return redirect(route('company.index'));
    }
}
