<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        if(! Schema::hasTable("items")){
            Schema::create('items', function (Blueprint $table) {
                $table->id();
                $table->string("name")->nullable();
                $table->decimal("amount")->nullable();
                $table->bigInteger("quantity")->nullable();
                $table->string("detail")->nullable();
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
