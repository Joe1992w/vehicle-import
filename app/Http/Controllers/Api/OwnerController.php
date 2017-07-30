<?php

namespace App\Http\Controllers\Api;

use App\Models\Owner;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $owners = Owner::with('company', 'vehicles')->orderBy('name')->paginate(100);
        return compact('owners');
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
        $owner->load('vehicles', 'company');
        return compact('owner');

    }

}
