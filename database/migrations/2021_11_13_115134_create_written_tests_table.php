<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWrittenTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('written_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('applicant_id', 11);
            $table->foreignId('administration_id',);
            $table->foreignId('schedule_id',)->nullable();
            $table->boolean('attendance')->nullable();
            $table->integer('score',)->nullable();
            $table->boolean('status')->nullable();
            $table->boolean('process')->nullable();
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
        Schema::dropIfExists('written_tests');
    }
}
