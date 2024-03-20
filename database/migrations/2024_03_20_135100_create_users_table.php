<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('numero_reserva')->nullable();
            $table->string('reward')->nullable();
            $table->longText('descripcion')->nullable();
            $table->string('name', 250)->nullable();
            $table->string('email', 250)->nullable();
            $table->longText('urlproductos')->nullable();
            $table->string('phone', 250)->nullable();
            $table->integer('city_id')->default(0);
            $table->string('address', 250)->nullable();
            $table->string('img', 250)->nullable();
            $table->string('logo');
            $table->longText('qr_code')->nullable();
            $table->integer('status')->default(0);
            $table->string('img_discount')->nullable();
            $table->double('saldo');
            $table->string('password', 250)->nullable();
            $table->string('shw_password', 250)->nullable();
            $table->rememberToken();
            $table->string('min_cart_value', 250)->nullable();
            $table->string('delivery_charges_value', 250)->nullable();
            $table->integer('delivery_min_charges_value');
            $table->integer('delivery_min_distance');
            $table->integer('type_charges_value');
            $table->string('distance_max');
            $table->string('opening_time', 6)->nullable();
            $table->string('closing_time', 6)->nullable();
            $table->integer('trending')->default(0);
            $table->string('delivery_time', 250)->nullable();
            $table->integer('person_cost')->nullable();
            $table->string('lat', 250)->nullable();
            $table->string('lng', 250)->nullable();
            $table->string('c_type');
            $table->string('c_value');
            $table->integer('t_type');
            $table->double('t_value');
            $table->string('purse_x_table', 200);
            $table->string('purse_x_pickup', 200);
            $table->string('purse_x_delivery', 200);
            $table->integer('stripe_pay');
            $table->integer('p_staff');
            $table->string('service_del', 50);
            $table->integer('pickup');
            $table->integer('open')->default(0);
            $table->string('type', 250)->nullable();
            $table->integer('subtype');
            $table->integer('subsubtype');
            $table->integer('type_menu');
            $table->integer('reservation_available');
            $table->string('Cuenta_clave', 50);
            $table->string('banco_name', 300);
            $table->text('s_data')->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
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
        Schema::dropIfExists('users');
    }
}
