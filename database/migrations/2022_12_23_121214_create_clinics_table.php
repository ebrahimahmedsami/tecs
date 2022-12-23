<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('doctor_id');
            $table->string('name_en')->nullable();
            $table->string('name_ar')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->text('email')->nullable();
            $table->integer('disclosure_price')->nullable();
            $table->integer('rediscovery_price')->nullable();
            $table->tinyInteger('today_capacity')->nullable();
            $table->time('time_form')->nullable();
            $table->time('time_to')->nullable();
            $table->enum('is_blocked',[0,1])->default(0)->comment('0=>un-blocked');
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
        Schema::dropIfExists('clinics');
    }
}
