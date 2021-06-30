<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        if(! Schema::hasTable("order_items")){
            Schema::create('order_items', function (Blueprint $table) {
                $table->id();
                $table->bigInteger("user_id")->nullable();
                $table->bigInteger("item_id")->nullable();
                $table->integer("quantity")->nullable();
                $table->decimal("total",10,2)->nullable();
                $table->decimal("rate")->nullable();
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
        Schema::dropIfExists('order_items');
    }
}
