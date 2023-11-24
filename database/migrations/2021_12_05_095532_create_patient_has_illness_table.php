<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientHasIllnessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_has_illness', function (Blueprint $table) {

            $table->primary(["patient_id", "illness_id"], "patient_illness_id");

            $table->unsignedBigInteger("patient_id");
            $table->foreign("patient_id")
                ->on("patients")
                ->references("user_id");

            $table->unsignedBigInteger("illness_id");
            $table->foreign("illness_id")
                ->on("illnesses")
                ->references("id");

            $table->unsignedBigInteger("physician_id");
            $table->foreign("physician_id")
                ->on("physicians")
                ->references("user_id");

            $table->date("detected_at")->nullable();

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
        Schema::dropIfExists('patient_has_illness');
    }
}
