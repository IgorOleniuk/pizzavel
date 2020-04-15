<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
      $table->id();
      $table->string('pizza_name');
      $table->string('address');
      $table->string('size');
      $table->string('toppings')->nullable();
      $table->string('instructions')->nullable();
      $table->integer('status_id')->unsigned()->default(1);
      $table->integer('user_id')->unsigned();
      $table->timestamps();

      $table->foreign('status_id')->references('id')->on('statuses');
      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
