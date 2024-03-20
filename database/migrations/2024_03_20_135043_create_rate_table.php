<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('user_id');
            $table->integer('store_id');
            $table->integer('staff_id');
            $table->integer('order_id');
            $table->integer('event_id');
            $table->integer('star')->default(0);
            $table->integer('star_staff1');
            $table->integer('star_staff2');
            $table->text('comment')->nullable();
            $table->text('comment_staff')->nullable();
            $table->integer('sanit_process')->nullable();
            $table->integer('status_prod')->nullable();
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
        Schema::dropIfExists('rate');
    }
}
