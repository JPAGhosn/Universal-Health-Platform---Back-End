<?php

use App\Http\Controllers\IllnessController;
use App\Http\Controllers\Physician\IllnessController as PhysicianIllnessController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Auth::routes();

Route::middleware(["auth:sanctum"])->group(function (){

    Route::resource("illnesses", IllnessController::class);

    Route::middleware("patient")->prefix("patients/{patient}/")->group(function () {

        Route::get("illnesses", [\App\Http\Controllers\IllnessController::class, "showAllPatientIllnesses"]);
        Route::get("illnesses/{illness}", [\App\Http\Controllers\IllnessController::class, "showPatientIllnessDetails"]);
    });

    Route::middleware("physician")->prefix("physicians/{physician}/")->group(function () {
        Route::get("patients", [\App\Http\Controllers\PatientController::class, "GetAllPatientsOfPhysician"]);
        Route::get("patients/{patient}", [\App\Http\Controllers\PatientController::class, "GetPatientOfPhysicianDetails"]);
    });
});


