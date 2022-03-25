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
        Schema::create('products', function (Blueprint $table) {
            $table->unsignedBigInteger('id',true,20);
            $table->unsignedBigInteger('category_id',false,20);
            $table->unsignedBigInteger('promotion_id',false,20);
            $table->string('name',255);
            $table->string('thumbnail',255);
            $table->float('price',20,2);
            $table->longText('content');
            $table->string('description',255);
            $table->integer('quantity',false,false);
            $table->boolean('status');
            $table->timestamp('deleted_at');
            
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('promotion_id')->references('id')->on('promotions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
