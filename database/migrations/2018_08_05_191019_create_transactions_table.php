<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('transactions')){
            Schema::create('transactions', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('item_id')->unsigned();
                $table->integer('quantity')->unsigned();
                $table->datetime('txn_date');
                $table->string('txn_code','20'); /*cash, check, credit_card*/
                $table->integer('discount_rate')->unsigned();
                $table->string('user_id','30');
                $table->string('status','15');
                $table->timestamps();

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
        Schema::dropIfExists('transactions');
    }
}
