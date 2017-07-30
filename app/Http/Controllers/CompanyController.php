<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Vehicle;
use Illuminate\Http\Request;

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
        $companies = Company::with('employees')->orderBy('name')->paginate(10);
        return view('companies.index')->with(compact('companies'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
        $vehicles = Vehicle::whereHas('owner', function ($query) use ($company) {
            $query->whereHas('company', function ($query) use ($company) {
                $query->where('id', $company->id);
            });
        })->get();

        return view('companies.show')->with(compact(['company', 'vehicles']));
    }

}
