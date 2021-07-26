<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('variant_id')->references('id')
                ->on('variants')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('price_list_id')->references('id')
                ->on('price_lists')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('list_price');
            $table->integer('sale_price');
            $table->dateTime('sale_start');
            $table->dateTime('sale_end');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prices');
    }
}
