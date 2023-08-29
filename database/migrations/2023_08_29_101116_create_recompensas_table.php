<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecompensasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recompensas', function (Blueprint $table) {
            $table->id();
            $table->integer('reserva')->nullable(); 
            $table->date('fecha')->nullable(); 
            $table->double('valor')->nullable(); 
            $table->integer('id_cliente')->nullable();
            $table->integer('id_negocio')->nullable();
            $table->longText('descripcion')->nullable();
            $table->integer('status')->default('0');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recompensas');
    }
}
