<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('id',true,20);
            $table->unsignedBigInteger('user_id',false,20);
            $table->unsignedBigInteger('shipping_method_id',false,20);
            $table->unsignedBigInteger('payment_method_id',false,20);

            $table->string('name',255);
            $table->string('email',255);
            $table->string('phone',20);
            $table->date('order_date');
            $table->string('address',255);
            $table->tinyInteger('status',false,2);
            $table->timestamp('deleted_at');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users_ecommerce');
            $table->foreign('shipping_method_id')->references('id')->on('shipping_methods');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');
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
};
