<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalIdentitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personalidentities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id', 11);
            $table->foreignId('gender_id', 2);
            $table->foreignId('edu_id', 11);
            $table->string('name', 35);
            $table->date('dob');
            $table->string('address', 100);
            $table->string('phone', 15);
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
        Schema::dropIfExists('personalidentities');
    }
}
