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
            $table->string('name')->nullable();
            $table->string('slogan')->nullable();
            $table->text('description')->nullable();
            $table->text('notes')->nullable();
            $table->string('colors')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('twitter')->nullable();
            $table->string('mobile')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('iphone')->nullable();
            $table->string('android')->nullable();
            $table->string('path')->nullable();
            $table->string('image')->nullable();
            $table->integer('points')->nullable(); // in points only
            $table->boolean('is_complete')->default(0);
            $table->boolean('on_progress')->default(0);

            $table->integer('service_id')->unsigned()->index();
            $table->foreign('service_id')->references('id')->on('services');

            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');

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
