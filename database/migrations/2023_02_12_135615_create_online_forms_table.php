<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_forms', function (Blueprint $table) {
            $table->id();
            $table->string('fullname')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('homeAddress')->nullable();
            $table->string('mobileNumber')->nullable();
            $table->string('gender')->nullable();
            $table->string('nationality')->nullable();
            $table->string('email')->nullable();
            $table->string('dob_ad')->nullable();
            $table->string('dob_bs')->nullable();
            $table->string('age')->nullable();
            $table->string('program')->nullable();
            $table->string('attended')->nullable();
            $table->string('levelPassed')->nullable();
            $table->string('training')->nullable();
            $table->string('about')->nullable();
            $table->string('encouraged')->nullable();
           
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
        Schema::dropIfExists('online_forms');
    }
};
