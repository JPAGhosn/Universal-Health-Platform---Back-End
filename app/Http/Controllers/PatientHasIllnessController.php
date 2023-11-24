<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhysicianSetIllnessForPatientRequest;
use App\Http\Requests\removeIllnessFromPatientRequest;
use App\Models\Illness;
use App\Models\Patient;
use App\Models\PatientHasIllness;
use App\Models\Physician;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class PatientHasIllnessController extends Controller
{
    public function setIllnessForPatientFromPhysician(PhysicianSetIllnessForPatientRequest $request, Physician $physician, Patient $patient)
    {
        Log::debug($patient);
        $illness = Illness::find($request->input("illness_id"));

//        $physician = $physician::with("user");

        $patient_has_illness_to_create = [
            "patient_id" => $patient->user_id,
            "illness_id" => $illness->id,
            "physician_id" => $physician->user_id,
            "detected_at" => Carbon::today()
        ];

        try {
            $patient_has_illness = PatientHasIllness::query()->create($patient_has_illness_to_create);
            return response()->json([
                "patient_has_illness" => $patient_has_illness->load(["patient", "illness", "physician"]),
                "message" => "{$patient->user->first_name} {$patient->user->last_name} has been detected with {$illness->name} by {$physician->user->first_name} {$physician->user->last_name}"
            ]);
        }
        catch (QueryException $e)
        {
            return response()->json([
                "message" => "{$physician->user->first_name} {$physician->user->last_name} has already told that {$patient->user->first_name} {$patient->user->last_name} has {$illness->name}"
            ], 400);
        }
    }

    public function showAllIllnessForPatientFromPhysician()
    {
        $all_illness_for_patient = auth()->user()
            ->physician
            ->load(["patient_has_illness.patient.user", "patient_has_illness.illness"])
            ->patient_has_illness;

        return response()->json([
            "illness_for_patient" => $all_illness_for_patient
        ]);
    }

    public function removeIllnessFromPatientFrom(removeIllnessFromPatientRequest $request)
    {
        $patient_id = $request->input("patient_id");
        $illness_id = $request->input("illness_id");

        $deleted = auth()->user()
            ->physician
            ->load(["patient_has_illness.patient.user", "patient_has_illness.illness"])
            ->patient_has_illness()
            ->where("patient_id", "=", $patient_id)
            ->where("illness_id", "=", $illness_id)
            ->delete();

        try {
            if ($deleted > 0)
            {
                return response()->json([
                    "message" => "Illness removed from patient"
                ]);
            }
            else {
                return response()->json([
                    "message" => "Could not remove this illness from patient."
                ], 400);
            }
        }
        catch (QueryException $e)
        {
            return response()->json([
                "message" => "cannot delete this illness from the patient."
            ],400);
        }
    }

}
