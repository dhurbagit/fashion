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
        Schema::create('academics', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('section_heading')->nullable();
            $table->string('section_subCaption')->nullable();
            $table->string('heading1')->nullable();
            $table->longText('editor')->nullable();
            $table->string('heading2')->nullable();
            $table->longText('description1')->nullable();
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
        Schema::dropIfExists('academics');
    }
};
