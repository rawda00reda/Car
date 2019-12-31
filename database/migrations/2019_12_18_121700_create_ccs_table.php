<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ccs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('cc');
            $table->unsignedBigInteger('date_id');
            $table->foreign('date_id')->references('id')
                ->on('dates')->onDelete('cascade');
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
        Schema::dropIfExists('ccs');
    }
}
