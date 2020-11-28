<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCbusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cbus', function (Blueprint $table) {
            $table->id();
            $table->string('alias')->nullable();
            $table->string('cbu');
            $table->unsignedBigInteger('comercio_id');
            $table->timestamps();

            $table->foreign('comercio_id')->references('id')->on('comercios')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cbus');
    }
}
