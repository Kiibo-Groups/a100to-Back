<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('store_id');
            $table->integer('category_id');
            $table->string('name', 250)->nullable();
            $table->string('description', 1500)->nullable();
            $table->integer('status');
            $table->string('img', 250)->nullable();
            $table->string('small_price', 250)->nullable();
            $table->double('last_price');
            $table->string('medium_price', 250)->nullable();
            $table->string('large_price', 250)->nullable();
            $table->string('xlarge_price')->nullable();
            $table->integer('sort_no')->default(0);
            $table->integer('nonveg')->default(0);
            $table->integer('trending');
            $table->text('s_data')->nullable();
            $table->timestamp('created_at')->useCurrent()->useCurrentOnUpdate();
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
        Schema::dropIfExists('item');
    }
}
