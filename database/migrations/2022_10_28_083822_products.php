<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products',function (Blueprint $table){
            $table->id();
            $table->string('category',255)->nullable(false);
            $table->string('id_of_product',255)->unique();
            $table->string('name',255)->nullable(false);
            $table->string('volume',255)->nullable();
            $table->string('price',255)->nullable();
            $table->string('description',255);
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
        //
    }
}
