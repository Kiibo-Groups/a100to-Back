<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('store_id')->default(0);
            $table->string('code', 250)->nullable();
            $table->string('description', 5000)->nullable();
            $table->string('img');
            $table->string('min_cart_value', 250)->nullable();
            $table->string('upto', 250)->nullable();
            $table->integer('type')->default(0);
            $table->string('value', 250)->nullable();
            $table->integer('status')->default(0);
            $table->string('start_from', 250)->nullable();
            $table->string('valid_till', 250)->nullable();
            $table->integer('unique_offer');
            $table->text('s_data')->nullable();
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
        Schema::dropIfExists('offer');
    }
}
