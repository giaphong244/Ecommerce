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
        Schema::create('ratings', function (Blueprint $table) {
            $table->unsignedBigInteger('id',true,20);
            $table->unsignedBigInteger('product_id',false,20);
            $table->unsignedBigInteger('user_id',false,20);
            $table->string('comment',255);
            $table->tinyInteger('rate',false,false,2);
            
            // $table->timestamp('updated_at');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users_ecommerce');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratings');
    }
};
