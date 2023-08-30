<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPrimeraToRecompensas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recompensas', function (Blueprint $table) {
            $table->boolean('primaria')->default('0')->after('id')->comment('0 normal y 1 primaria'); 
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
