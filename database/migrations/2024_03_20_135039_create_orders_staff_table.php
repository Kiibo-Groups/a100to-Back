<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_staff', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('external_id', 100);
            $table->integer('order_id');
            $table->integer('event_id');
            $table->integer('d_boy');
            $table->integer('type')->default(0);
            $table->integer('status');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_staff');
    }
}
