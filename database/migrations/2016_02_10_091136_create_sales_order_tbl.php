<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesOrderTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_order', function (Blueprint $table) {
          $table->increments('id');
          $table->string('transaction_number')->unique();
          $table->integer('product_id')->unsigned();
          $table->string('sku');
          $table->decimal('sale_price', 5, 2);
          $table->integer('quantity');
          $table->integer('status')->unsigned();
          $table->timestamps();
          $table->integer('user_id')->unsigned();

          $table->foreign('product_id')
                ->references('id')
                ->on('products');

          $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sales_order');
    }
}
