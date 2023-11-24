<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePhysicianRequest;
use App\Http\Requests\UpdatePhysicianRequest;
use App\Models\Physician;

class PhysicianController extends Controller
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
     * @param  \App\Http\Requests\StorePhysicianRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePhysicianRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Physician  $physician
     * @return \Illuminate\Http\Response
     */
    public function show(Physician $physician)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Physician  $physician
     * @return \Illuminate\Http\Response
     */
    public function edit(Physician $physician)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePhysicianRequest  $request
     * @param  \App\Models\Physician  $physician
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePhysicianRequest $request, Physician $physician)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Physician  $physician
     * @return \Illuminate\Http\Response
     */
    public function destroy(Physician $physician)
    {
        //
    }
}
