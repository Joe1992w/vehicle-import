<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $owners = Owner::with('company', 'vehicles')->orderBy('name')->paginate(10);
        return view('owners.index')->with(compact('owners'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner)
    {
        //
        $vehicles = Vehicle::whereOwner($owner)->get();
        return view('owners.show')->with(compact(['owner', 'vehicles']));

    }

}
