<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommanedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commaned', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('external_id', 100);
            $table->integer('user_id');
            $table->string('code_order', 15);
            $table->text('address_origin');
            $table->string('address_destin');
            $table->string('first_instr');
            $table->string('second_instr');
            $table->double('add_cash');
            $table->integer('d_boy');
            $table->string('price_comm');
            $table->double('d_charges');
            $table->double('propine');
            $table->double('total');
            $table->double('status')->index();
            $table->string('lat_orig');
            $table->string('lng_orig');
            $table->string('lat_dest');
            $table->string('lng_dest');
            $table->integer('payment_method');
            $table->string('payment_id');
            $table->integer('type_order');
            $table->string('pic_end_order')->nullable();
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
        Schema::dropIfExists('commaned');
    }
}
