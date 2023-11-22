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
        Schema::create('our_teams', function (Blueprint $table) {
            $table->id();
            $table->string('section_title')->nullable();
            $table->string('section_title_caption')->nullable();
            $table->string('image')->nullable();
            $table->string('name')->nullable();
            $table->string('designation')->nullable();
            $table->string('facbook_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('linked_link')->nullable();
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
        Schema::dropIfExists('our_teams');
    }
};
