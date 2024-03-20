<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('store_id');
            $table->string('name', 250)->nullable();
            $table->integer('status')->default(0);
            $table->integer('type');
            $table->integer('required');
            $table->integer('single_option');
            $table->integer('max_options');
            $table->string('id_element');
            $table->integer('sort_no')->default(0);
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
        Schema::dropIfExists('category');
    }
}
