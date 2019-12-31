<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->integer('mobile')->unique();
            $table->integer('email')->unique()->nullable();

            $table->string('shopAr')->nullable();
            $table->string('shopEn')->nullable();
            $table->string('shopUr')->nullable();
            $table->string('ownerAr')->nullable();
            $table->string('ownerEn')->nullable();
            $table->string('ownerUr')->nullable();

            $table->string('logo')->nullable();
            $table->string('employee_id')->nullable();

            $table->string('special')->nullable();


            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')
                ->on('countries')->onDelete('cascade');


            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')
                ->on('cities')->onDelete('cascade');


            $table->string('password');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
