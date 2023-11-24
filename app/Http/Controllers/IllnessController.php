<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIllnessRequest;
use App\Http\Requests\UpdateIllnessRequest;
use App\Models\Illness;
use App\Models\Patient;
use App\Models\Physician;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Gate;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class IllnessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $illnesses = Illness::all();
        return response()->json([
            "illnesses" => $illnesses
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreIllnessRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreIllnessRequest $request)
    {
        try {
            $illness = Illness::query()->create([
                "name" => $request->input("name"),
                "creator_id" => auth()->user()->id
            ]);
        }
        catch (QueryException $e)
        {
            return  response()->json([
                "message" => "This illness already exists in our database."
            ],400);
        }


        if (!isset($illness))
        {
            return response()->json([
                "message" => "Something went wrong."
            ], 400);
        }

        return response()->json([
            "illness" => $illness
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Illness  $illness
     */
    public function show(Illness $illness)
    {
        return response()->json([
            "illness" => $illness->load("creator")
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIllnessRequest  $request
     * @param  \App\Models\Illness  $illness
     */
    public function update(UpdateIllnessRequest $request, Illness $illness)
    {

        try {
            $illness->update($request->all());
        }
        catch (QueryException $e)
        {
            return response()->json([
                "message" => "Illness already exists"
            ], 400);
        }

        return [
            "illness" => $illness
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Illness  $illness
     */
    public function destroy(Illness $illness)
    {
        Gate::authorize("delete-model", $illness);

        try {
            $illness->delete();
            return response()->json([
                "message" => "Illness deleted"
            ]);
        }
        catch (QueryException $e)
        {
            return response()->json([
                "message" => "Something went wrong while deleting the illness."
            ], 400);
        }
    }

    public function showAllPatientIllnesses(Patient $patient)
    {
        $illnesses = $patient
            ->illnesses()
            ->get();

        return response()->json([
            "illnesses" => $illnesses
        ]);
    }

    public function showPatientIllnessDetails(Patient $patient, Illness $illness)
    {
        $pivot = $patient
            ->illnesses()
            ->find($illness->id)
            ->pivot;

        $physician = Physician::find($pivot->physician_id);

        $response = [
            "illness" => $illness,
            "patient" => $patient->load("user"),
            "physician" => $physician->load("user")
        ];

        return response()->json($response);
    }
}
