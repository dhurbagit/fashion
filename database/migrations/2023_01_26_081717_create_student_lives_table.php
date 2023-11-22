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
        // student life
        Schema::create('student_lives', function (Blueprint $table) {
            $table->id();
            $table->string('section_title')->nullable();
            $table->string('image')->nullable();
            $table->string('bg_image')->nullable();
            $table->string('title')->nullable();
            $table->string('date')->nullable();
            $table->longText('description')->nullable();
            $table->string('status')->default(0);
            $table->string('type')->default(0);
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
        Schema::dropIfExists('student_lives');
    }
};
