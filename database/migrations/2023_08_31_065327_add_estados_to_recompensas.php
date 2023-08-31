<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEstadosToRecompensas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recompensas', function (Blueprint $table) {
            $table->boolean('visto')->default('0')->after('id')->comment('0 no y 1 si'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recompensas', function (Blueprint $table) {
            //
        });
    }
}
