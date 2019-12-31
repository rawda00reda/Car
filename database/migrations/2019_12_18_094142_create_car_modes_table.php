<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarModesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_modes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titleAr');
            $table->string('titleEn');
            $table->string('titleUr');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')
                ->on('brands')->onDelete('cascade');
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
        Schema::dropIfExists('car_modes');
    }
}
