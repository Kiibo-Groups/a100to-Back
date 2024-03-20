<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_user', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('foto')->nullable();
            $table->string('customer_id')->nullable();
            $table->integer('status')->default(0);
            $table->string('name', 250)->nullable();
            $table->string('email', 250)->nullable();
            $table->string('last_name')->nullable();
            $table->string('birthday')->nullable();
            $table->string('sex_type')->nullable();
            $table->integer('last_city')->default(0);
            $table->string('user_name')->nullable();
            $table->date('fecha_cambio')->nullable();
            $table->string('password', 250)->nullable();
            $table->string('pswfacebook', 250)->nullable();
            $table->string('phone', 250)->nullable();
            $table->string('otp', 250)->nullable();
            $table->string('refered')->nullable();
            $table->double('saldo')->default(0);
            $table->integer('tickets')->nullable()->comment("suma tickets 6 meses");
            $table->double('monedero')->default(0);
            $table->integer('saldo_xp')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->string('shw_password')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_user');
    }
}
