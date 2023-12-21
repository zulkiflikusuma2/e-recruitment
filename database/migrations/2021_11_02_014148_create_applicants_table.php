<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id', 11);
            $table->foreignId('personal_identity_id', 11);
            $table->foreignId('job_id', 11);
            $table->string('cv', 100);
            $table->string('photo', 100);
            $table->string('application_letter', 100);
            $table->string('certificate', 100);
            $table->string('transcript', 100);
            // $table->string('str')->nullable();              
            $table->string('document', 100)->nullable();
            $table->boolean('status')->nullable();
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
        Schema::dropIfExists('applicants');
    }
}
