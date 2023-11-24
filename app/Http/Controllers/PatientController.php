<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\Patient;
use App\Models\PatientHasIllness;
use App\Models\Physician;

class PatientController extends Controller
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
     * @param  \App\Http\Requests\StorePatientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatientRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePatientRequest  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }

    public function getAllPatients()
    {
        $physician = auth()->user()->physician;

        $patients = $physician
            ->patients()
            ->with("user")
            ->get()
        ;

        return response()->json([
            "patients" => $patients
        ]);
    }

    public function getPatientDetails(Patient $patient)
    {
        $physician = auth()->user()->physician;
        $patient_details = $physician
            ->patients()
            ->where("patients.user_id", "=", $patient->user_id)
            ->with("illnesses")
            // todo other
            ->first()
            ->toArray()
        ;

//        return $patient_details["illnesses"];

        // only show the illnesses that the physician had added
        $filtered_illnesses_by_physician = collect($patient_details['illnesses'])->filter(function ($illness) use ($physician) {
            return $illness['pivot']['physician_id'] == $physician->user_id;
        })->toArray();

        // todo filter other

        $patient_details['illnesses'] = $filtered_illnesses_by_physician;

        return response()->json([
            "patient" => $patient_details
        ]);
    }

    public function GetAllPatientsOfPhysician(Physician $physician)
    {
        $patients = auth()->user()
            ->physician
            ->load("patients.user")
            ->patients;

        return response()->json([
            "patients" => $patients
        ]);
    }

    public function GetPatientOfPhysicianDetails(Physician $physician, Patient $patient)
    {
        $physician = auth()->user()->physician;

        $patient = $physician
            ->patients()
            ->where("patients.user_id", "=", $patient->user_id)
            ->with("user")
            ->first();

        $detected_illnesses = PatientHasIllness::query()
            ->where("patient_has_illness.patient_id", "=", $patient->user_id)
            ->where("patient_has_illness.physician_id", "=", $physician->user_id)
            ->with([
//                "patient",
                "illness"
            ])
            ->get();


        return response()->json([
            "patient" => $patient,
            "illnesses" => $detected_illnesses
        ]);
    }
}
