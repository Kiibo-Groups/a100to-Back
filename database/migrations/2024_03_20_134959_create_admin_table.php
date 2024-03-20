<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->double('recompensa_nuevo')->nullable();
            $table->double('recompensa_compra')->nullable();
            $table->string('name', 250)->nullable();
            $table->text('perm');
            $table->integer('city_id');
            $table->integer('city_notify');
            $table->string('email', 250)->nullable();
            $table->string('username', 250)->nullable();
            $table->string('password', 250)->nullable();
            $table->string('shw_password');
            $table->rememberToken();
            $table->string('logo', 250)->nullable();
            $table->string('fb', 2500)->nullable();
            $table->string('insta', 2500)->nullable();
            $table->string('twitter', 2500)->nullable();
            $table->string('youtube', 2500)->nullable();
            $table->string('sms_api', 2500)->nullable();
            $table->string('currency', 250)->nullable();
            $table->string('costs_ship');
            $table->integer('c_type');
            $table->string('c_value');
            $table->integer('t_type_comm');
            $table->double('t_value_comm');
            $table->double('comm_stripe');
            $table->integer('comm_fijo_stripe');
            $table->integer('min_distance');
            $table->double('max_distance_staff');
            $table->integer('min_value');
            $table->text('store_type')->nullable();
            $table->string('paypal_client_id', 250)->nullable();
            $table->text('s_data');
            $table->string('stripe_api_id', 250)->nullable();
            $table->string('stripe_client_id', 250)->nullable();
            $table->string('ApiKey_google', 500);
            $table->string('url1')->nullable();
            $table->string('url2')->nullable();
            $table->integer('send_terminal');
            $table->double('max_cash');
            $table->integer('v_count');
            $table->double('v_value');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
}
