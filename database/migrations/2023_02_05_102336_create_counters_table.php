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
        Schema::create('counters', function (Blueprint $table) {
            $table->id();
            $table->string('counter1')->nullable();
            $table->string('counter2')->nullable();
            $table->string('counter3')->nullable();
            $table->string('counter4')->nullable();
            $table->string('counterTitle1')->nullable();
            $table->string('counterTitle2')->nullable();
            $table->string('counterTitle3')->nullable();
            $table->string('counterTitle4')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('counters');
    }
};
