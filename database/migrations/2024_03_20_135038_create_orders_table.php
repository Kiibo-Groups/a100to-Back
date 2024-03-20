<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('code_order');
            $table->string('external_id', 50);
            $table->integer('user_id');
            $table->integer('store_id');
            $table->string('name', 250);
            $table->string('email', 250);
            $table->string('phone', 250);
            $table->string('address', 250);
            $table->integer('InnStore');
            $table->integer('mesa');
            $table->string('d_charges', 250);
            $table->double('t_charges');
            $table->string('price_comm');
            $table->string('discount', 250);
            $table->string('total', 250);
            $table->double('status')->default(0);
            $table->integer('status_by')->default(0);
            $table->string('status_time', 250)->nullable();
            $table->integer('d_boy')->default(0);
            $table->string('notes', 2500)->nullable();
            $table->integer('type')->default(0);
            $table->integer('payment_method')->default(0);
            $table->string('payment_id', 2500)->nullable();
            $table->integer('use_mon');
            $table->double('uso_monedero');
            $table->double('monedero');
            $table->string('lat', 250)->nullable();
            $table->string('lng', 250)->nullable();
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
        Schema::dropIfExists('orders');
    }
}
