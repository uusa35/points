<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('path')->nullable();
            $table->string('image')->nullable();
            $table->string('slug_ar')->nullable();
            $table->string('slug_en')->nullable();
            $table->string('caption_ar')->nullable();
            $table->string('caption_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->integer('duration')->unsigned()->nullable();

            $table->smallInteger('parent_id')->unsigned()->default(0);
            $table->smallInteger('order')->unsigned()->nullable();

            $table->boolean('active')->default(1)->nullable();
            $table->boolean('is_files')->default(0)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
