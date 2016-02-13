<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients', function (Blueprint $table) {
          $table->increments('id');
          $table->string('ingredient_code')->unique();
          $table->string('ingredient_name',50);
          $table->text('description')->nullable();
          $table->integer('status');
          $table->integer('stock_qty');
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
        Schema::table('ingredients', function (Blueprint $table) {
            Schema::drop('ingredients');
        });
    }
}
