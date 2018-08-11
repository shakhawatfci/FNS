<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('phone');
            $table->text('address');
            $table->double('delivery_cost')->default(0);
            $table->string('order_date');
            $table->string('order_delivery_date')->nullable();
            $table->string('transection_id')->nullable();
            $table->tinyInteger('status')->comment = '0=pending,1=delivered';
            $table->tinyInteger('payment_type')->comment = '0=not_paid,1=paid';
            $table->tinyInteger('payment_location')->comment = '1=inside dhaka,2=outsite dhaka';
            $table->tinyInteger('payment_method')->comment = '1=cash,2=bkash,3=rocket';
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
