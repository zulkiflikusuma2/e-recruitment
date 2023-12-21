<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('applicant_id', 11);
            $table->foreignId('practicetest_id', 11);
            $table->foreignId('schedule_id')->nullable();
            $table->boolean('attendance')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('interviews');
    }
}
