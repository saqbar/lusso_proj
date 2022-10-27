<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MyUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_users',function (Blueprint $table){
            $table->id();
            $table->string('name',255);
            $table->string('surname',255);
            $table->string('login',255)->nullable(false)->unique('login');
            $table->string('password',255)->nullable(false);
            $table->string('remember_token',100)->nullable(true);
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
        Schema::create('my_users',function (Blueprint $table){
            $table->id();
            $table->string('name',255);
            $table->string('surname',255);
            $table->string('login',255)->nullable(false)->unique('login');
            $table->string('password',255)->nullable(false);
            $table->string('remember_token',100)->nullable(true);
            $table->timestamps();
        });
    }
}
