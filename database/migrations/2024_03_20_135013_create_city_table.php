<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('name', 250)->nullable();
            $table->string('lat');
            $table->string('lng');
            $table->string('h3index');
            $table->double('max_distance');
            $table->integer('status')->default(0);
            $table->integer('c_type');
            $table->string('c_value', 155);
            $table->double('min_distance');
            $table->double('min_value');
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
        Schema::dropIfExists('city');
    }
}
