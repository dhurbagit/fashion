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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category_slug');
            $table->integer('position');
            $table->boolean('main_child');
            $table->integer('parent_id')->nullable();
            $table->integer('header_footer');
            $table->boolean('mega_menu')->default(0);
            $table->boolean('publish_status')->default(0);
            $table->string('banner_image')->nullable();
            $table->string('image')->nullable();
            $table->string('page_title')->nullable();
            $table->text('title_slug')->nullable();
            $table->longText('content')->nullable();
            $table->string('external_link')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('menus');
    }
};
