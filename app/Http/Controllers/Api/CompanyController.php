<?php

namespace App\Http\Controllers\Api;

use App\Models\Company;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $companies = Company::with('employees.vehicles')->orderBy('name')->paginate(100);
        return compact('companies');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $company->load('employees.vehicles');
        return compact(['company', 'vehicles']);
    }

}
