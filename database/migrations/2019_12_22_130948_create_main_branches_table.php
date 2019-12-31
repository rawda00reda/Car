<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_branches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('streetAr');
            $table->string('streetEn');
            $table->string('streetUr');

            $table->string('technicianAr');
            $table->string('technicianEn');
            $table->string('technicianUr');
            $table->integer('phone');
            $table->integer('spec_id');

            $table->float('lat',10,3);
            $table->float('long',10,3);

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')
                ->on('countries')->onDelete('cascade');


            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')
                ->on('cities')->onDelete('cascade');

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
        Schema::dropIfExists('main_branches');
    }
}
