<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('items')){
            Schema::create('items', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name','100');
                $table->string('brand','30')->nullable();
                $table->string('model','30')->nullable();
                $table->string('size','20')->nullable();
                $table->string('color','20')->nullable();
                $table->string('type','20')->nullable();
                $table->decimal('price', 8, 2);
                $table->integer('stock')->unsigned();
                $table->string('barcode')->nullable();
                $table->char('delete_flag',1)->nullable();
                $table->timestamps();

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
        Schema::dropIfExists('items');
    }
}
