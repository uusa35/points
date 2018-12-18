<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('slug_ar')->nullable();
            $table->string('slug_en')->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('description_ar')->nullable();
            $table->string('caption_ar')->nullable();
            $table->string('caption_en')->nullable();
            $table->integer('duration')->nullable();
            $table->string('image')->nullable();
            $table->string('path')->nullable();
            $table->string('order')->nullable();

            $table->boolean('on_sale')->default(0);
            $table->integer('points')->unsigned();
            $table->integer('sale_points')->unsigned();
            $table->boolean('active')->default(0);

            $table->integer('category_id')->unsigned()->index();
            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::drop('services');
    }
}
