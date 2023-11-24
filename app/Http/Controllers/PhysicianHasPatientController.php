<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePhysicianHasPatientRequest;
use App\Http\Requests\UpdatePhysicianHasPatientRequest;
use App\Models\PhysicianHasPatient;

class PhysicianHasPatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePhysicianHasPatientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePhysicianHasPatientRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PhysicianHasPatient  $physicianHasPatient
     * @return \Illuminate\Http\Response
     */
    public function show(PhysicianHasPatient $physicianHasPatient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PhysicianHasPatient  $physicianHasPatient
     * @return \Illuminate\Http\Response
     */
    public function edit(PhysicianHasPatient $physicianHasPatient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePhysicianHasPatientRequest  $request
     * @param  \App\Models\PhysicianHasPatient  $physicianHasPatient
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePhysicianHasPatientRequest $request, PhysicianHasPatient $physicianHasPatient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PhysicianHasPatient  $physicianHasPatient
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhysicianHasPatient $physicianHasPatient)
    {
        //
    }
}
