<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->integer('menu_id');
            $table->integer('category_id');
            $table->integer('sub_category_id');
            $table->integer('product_id');
            $table->integer('user_id');
            $table->integer('sold_quantity');
            $table->string('sold_date');
            $table->double('buying_price');
            $table->double('sold_price');
            $table->double('total_buying_price')->comment = 'qty*buying_price';
            $table->double('total_sold_price')->comment = 'qty*sold_price';
            $table->string('product_size');
            $table->tinyInteger('order_status')->comment = '0=pending,1=delivered';
            $table->tinyInteger('payment')->comment = '0=not_paid,1=paid';
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
        Schema::dropIfExists('order_detail');
    }
}
