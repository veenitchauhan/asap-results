<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_collections', function (Blueprint $table) {
            $table->id();
            $table->integer('clinic_req_number');
            $table->integer('test_type_id');
            $table->string('symptoms', 100);
            $table->integer('lab_id');
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->date('date_of_birth');
            $table->boolean('is_minor')->default(0);
            $table->enum('gender', ['male', 'female']);
            $table->string('address', 255);
            $table->string('address_2', 255);
            $table->string('city', 100);
            $table->string('state', 100);
            $table->integer('zipcode');
            $table->string('phone_number', 20)->nullable();
            $table->string('email_id')->nullable();
            $table->integer('race_id');
            $table->integer('ethnicity_id');
            $table->integer('proof_id');
            $table->integer('state_code');
            $table->string('insurance_provider', 255);
            $table->string('insurance_policy_number', 100);
            $table->boolean('first_test')->default(0);
            $table->boolean('pregnant')->default(0);
            $table->boolean('healthcare')->default(0);
            $table->boolean('symptomatic')->default(0);
            $table->boolean('congregate')->default(0);
            $table->boolean('hospitalized')->default(0);
            $table->boolean('admitted')->default(0);
            $table->string('proof_filename', 100)->nullable();
            $table->string('insurance_card_front_filename', 100)->nullable();
            $table->timestamp('sample_collect_datetime');
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
        Schema::dropIfExists('patient_collections');
    }
}
