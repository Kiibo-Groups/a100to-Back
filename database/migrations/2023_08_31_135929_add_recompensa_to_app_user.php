<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRecompensaToAppUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('app_user', function (Blueprint $table) {
            $table->integer('tickets')->nullable()->after('saldo')->comment('suma tickets 6 meses'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('app_user', function (Blueprint $table) {
            //
        });
    }
}
