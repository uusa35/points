<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description')->nullable();
            $table->text('notes')->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('is_complete')->default(0);
            $table->boolean('is_client_viewed')->default(0);
            $table->boolean('is_designer_viewed')->default(0);
            $table->smallInteger('priority')->unsigned()->nullable();
            $table->boolean('is_urgent')->nullable();

            $table->integer('order_id')->unsigned()->index();
            $table->foreign('order_id')->references('id')->on('orders');

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
        Schema::drop('jobs');
    }
}
