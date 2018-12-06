<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVersionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('versions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('notes')->nullable();
            $table->text('description')->nullable();
            $table->string('path')->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('is_complete')->default(0);
            $table->boolean('is_client_viewed')->default(0);
            $table->boolean('is_designer_viewed')->default(0);

            $table->integer('job_id')->unsigned()->index();
            $table->foreign('job_id')->references('id')->on('jobs');
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
        Schema::drop('versions');
    }
}
