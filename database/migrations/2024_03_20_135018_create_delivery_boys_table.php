<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryBoysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_boys', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('external_id', 100);
            $table->integer('store_id')->default(0);
            $table->integer('city_id');
            $table->string('name', 250)->nullable();
            $table->string('phone', 250)->nullable();
            $table->integer('c_type_staff');
            $table->double('c_value_staff');
            $table->integer('type_driver');
            $table->integer('max_range_km');
            $table->string('rfc');
            $table->double('amount_acum');
            $table->string('password', 250)->nullable();
            $table->string('shw_password', 250)->nullable();
            $table->integer('status')->default(0);
            $table->integer('status_admin');
            $table->integer('status_send');
            $table->string('lat', 200)->nullable();
            $table->string('lng', 200)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default('0000-00-00 00:00:00');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivery_boys');
    }
}
