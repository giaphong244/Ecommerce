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
        Schema::create('users_ecommerce', function (Blueprint $table) {
            $table->unsignedBigInteger('id',true,20);
            $table->unsignedBigInteger('role_id',false,20);
            $table->string('name',255);
            $table->string('email',255);
            $table->string('password',20);
            $table->date('birthday');
            $table->tinyInteger('gender',false,false,2);
            $table->string('phone',20);
            $table->string('address',100);
            $table->timestamp('deleted_at');
            $table->timestamps();
            
            $table->foreign('role_id')->references('id')->on('roles');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_ecommerce');
    }
};
