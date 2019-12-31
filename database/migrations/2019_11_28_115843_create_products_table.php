<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('deptEn');
            $table->integer('deptAr');
            $table->integer('deptUr');
            $table->integer('brandEn');
            $table->integer('brandAr');
            $table->integer('brandUr');
            $table->integer('modelAr');
            $table->integer('modelEn');
            $table->integer('modelUr');
            $table->integer('prodate');
            $table->integer('cc');
            $table->string('proAr');
            $table->string('proEn');
            $table->string('proUr');
            $table->integer('stock');
            $table->string('color');
            $table->double('priceA','8','3');
            $table->double('priceB','8','3');
            $table->string('img');
            $table->text('infoAr');
            $table->text('infoEn');
            $table->text('infoUr');
            $table->boolean('publish');
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
        Schema::dropIfExists('products');
    }
}
