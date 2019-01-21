<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('cart')){
            Schema::create('cart', function (Blueprint $table) {
                $table->increments('id');
                $table->string('receipt_id','50');
                $table->integer('item_id')->unsigned();
                $table->integer('quantity')->unsigned();


                $table->foreign('item_id')->references('id')->on('items');

            });

        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart');
    }
}
