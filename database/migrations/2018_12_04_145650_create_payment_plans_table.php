<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('slug_ar')->nullable();
            $table->string('slug_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();

            $table->string('image')->nullable();
            $table->string('path')->nullable();

            $table->integer('price')->nullable();
            $table->integer('bonus')->nullable();
            $table->boolean('apply_bonus')->default(0);
            $table->integer('order')->nullable();
            $table->boolean('active')->default(0);

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
        Schema::drop('payment_plans');
    }
}
