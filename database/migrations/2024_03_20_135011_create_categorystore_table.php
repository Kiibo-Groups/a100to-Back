<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorystoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorystore', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('name');
            $table->string('img');
            $table->integer('status');
            $table->integer('type_cat');
            $table->integer('id_cp');
            $table->integer('id_c');
            $table->integer('sort_no');
            $table->text('s_data');
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
        Schema::dropIfExists('categorystore');
    }
}
