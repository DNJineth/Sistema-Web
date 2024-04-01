<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progresos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estudiantes_id');
            $table->string("tema");
            $table->string("modulo");
            $table->timestamps();
            $table->foreign('estudiantes_id')->references('id')->on('estudiantes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('progresos');
    }
}
