<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhysicianHasPatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physician_has_patient', function (Blueprint $table) {

            $table->primary(["physician_id", "patient_id"], "physician_patient_id");

            $table->unsignedBigInteger("physician_id");
            $table->foreign("physician_id")
                ->on("physicians")
                ->references("user_id");

            $table->unsignedBigInteger("patient_id");
            $table->foreign("patient_id")
                ->on("patients")
                ->references("user_id");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('physician_has_patients');
    }
}
