<?php

namespace App\Http\Requests;

use App\Models\Illness;
use App\Models\Patient;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class PhysicianSetIllnessForPatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        Log::debug($this->route()->parameters()['patient']);
//        $patient = Patient::find();

//        return Gate::allows("doctor-handle-patient-illness", $patient);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
