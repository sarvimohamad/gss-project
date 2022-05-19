<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name')->nullable();
            $table->bigInteger('mobile')->nullable();
            $table->bigInteger('telephone')->nullable();
            $table->string('address')->nullable();
            $table->string('province_id')->nullable();
            $table->string('city_id')->nullable();
            $table->string('desc')->nullable();
            $table->string('typeRequest')->nullable();
            $table->string('bankName')->nullable();
            $table->string('serial')->nullable();
            $table->string('status_id')->default('send');
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
        Schema::dropIfExists('services');
    }
}
