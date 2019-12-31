<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddcarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addcars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('brandEn');
            $table->integer('brandAr');
            $table->integer('brandUr');
            $table->integer('modelAr');
            $table->integer('modelEn');
            $table->integer('modelUr');
            $table->integer('prodate');
            $table->integer('cc');
            $table->string('img');
            $table->text('infoAr');
            $table->text('infoEn');
            $table->text('infoUr');
            $table->string('companyName');
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
        Schema::dropIfExists('addcars');
    }
}
