<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menu_id');
            $table->integer('category_id');
            $table->integer('sub_category_id');
            $table->string('product_code');
            $table->string('product_name');
            $table->string('product_image');
            $table->double('buying_price');
            $table->double('selling_price');
            $table->double('discount')->default(0);
            $table->integer('quantity');
            $table->integer('current_quantity');
            $table->tinyInteger('size_status')->default(0)->comment = '0=no size,1=have_size';
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->integer('total_view')->default(1);
            $table->integer('total_sold')->default(1);
            $table->tinyInteger('status')->default(1)->comment = '1=active 0=inactive';
            $table->integer('admin_id');

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
        Schema::dropIfExists('product');
    }
}
