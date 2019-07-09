<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\SoftDeletes;

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
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('items');
            $table->decimal('amount', 6, 2);
            $table->decimal('discount', 6, 2)->nullable();
            $table->bigInteger('order_status_id')->unsigned();
            $table->foreign('order_status_id')->references('id')->on('order_statuses')->nullable()->onDelete('cascade');
            $table->bigInteger('address_id')->unsigned();
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->bigInteger('shipping_id')->unsigned();
            $table->foreign('shipping_id')->references('id')->on('shippings')->nullable()->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
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
