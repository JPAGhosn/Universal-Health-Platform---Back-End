<?php

namespace App\Providers;

use App\Models\PhysicianHasPatient;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define("update-model", function($user, $model) {
            return $user->id == $model->creator_id;
        });

        Gate::define("delete-model", function($user, $model) {
            return $user->id == $model->creator_id;
        });

        Gate::define("doctor-handle-patient-illness", function ($user, $patient) {
            $isPhysicianOfPatient = PhysicianHasPatient::query()
                ->where("physician_id", "=", $user->id)
                ->where("patient_id", "=", $patient->user_id)
                ->exists();
            return $isPhysicianOfPatient;
        });

        $this->registerPolicies();
    }
}
