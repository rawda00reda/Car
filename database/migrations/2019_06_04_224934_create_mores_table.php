<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pro_id');
            $table->integer('stock');
            $table->string('color');
            $table->double('priceA');
            $table->double('priceB');
            $table->string('img');
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
        Schema::dropIfExists('mores');
    }
}
