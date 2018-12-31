<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_ar')->nullable();
            $table->string('name_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->string('google_map_url')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('google')->nullable();
            $table->string('website')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkin')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('fax')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('info_email')->nullable();
            $table->string('support_email')->nullable();
            $table->string('admin_email')->nullable();
            $table->string('sales_email')->nullable();
            $table->string('country')->nullable();
            $table->text('address_ar')->nullable();
            $table->text('address_en')->nullable();
            $table->string('logo')->nullable();
            $table->string('bg')->nullable();
            $table->string('path')->nullable();
            $table->string('zapper')->nullable();
            $table->string('qr')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->text('on_home_speech_ar')->nullable();
            $table->text('on_home_speech_en')->nullable();
            $table->text('title_one_ar')->nullable();
            $table->text('title_one_en')->nullable();
            $table->text('section_one_ar')->nullable();
            $table->text('section_one_en')->nullable();
            $table->text('title_two_ar')->nullable();
            $table->text('title_two_en')->nullable();
            $table->text('section_two_ar')->nullable();
            $table->text('section_two_en')->nullable();
            $table->text('title_three_ar')->nullable();
            $table->text('title_three_en')->nullable();
            $table->text('section_three_ar')->nullable();
            $table->text('section_three_en')->nullable();
            $table->string('video')->nullable();
            $table->boolean('annual_subscription')->default(0);
            $table->boolean('maintenance_mode')->default(0);
            $table->boolean('auto_enrollment')->default(0);
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
        Schema::dropIfExists('settings');
    }
}
