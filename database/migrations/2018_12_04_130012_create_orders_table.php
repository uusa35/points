<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_ar')->nullable();
            $table->string('name_en')->nullable();
            $table->string('slogan')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('twitter')->nullable();
            $table->string('mobile')->nullable();
            $table->string('phone_one')->nullable();
            $table->string('phone_tow')->nullable();
            $table->string('fax')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('snapchat')->nullable();
            $table->string('iphone')->nullable();
            $table->string('android')->nullable();
            $table->string('path')->nullable();
            $table->integer('points')->nullable(); // in points only

            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->text('notes_ar')->nullable();
            $table->text('notes_en')->nullable();


            $table->boolean('is_paid')->default(0); // paid
            $table->boolean('is_complete')->default(0); // related to complete the job


            $table->integer('service_id')->unsigned()->index();
            $table->foreign('service_id')->references('id')->on('services');

            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('preferred_colors_1')->nullable();
            $table->string('preferred_colors_2')->nullable();
            $table->string('preferred_colors_3')->nullable();
            $table->string('unwanted_colors_1')->nullable();
            $table->string('unwanted_colors_2')->nullable();
            $table->string('unwanted_colors_3')->nullable();
            $table->boolean('active')->default(1);

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
        Schema::drop('orders');
    }
}


// orders ==> when confirm order (balance should be decreased)

// transactions (user_id + reference_id, is_complete : boolean , amount : actual amount paid  ) only in KWD ==> when it's success then update the balance

// payment_plans (amount === integer , bonus ( represents points added) , is_applied , name , slug_ar , slug_en , active)

// balance (user_id + points (amount paid + the bounce) you may add the bounce here !!!
