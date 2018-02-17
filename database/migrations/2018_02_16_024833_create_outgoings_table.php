<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutgoingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outgoings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name')->unique();
            $table->decimal('qty', 12, 2)->default(0);
            $table->integer('stock_id')->unsigned()->nullable();
            $table->foreign('stock_id')->references('id')->on('stocks')
                ->onUpdate('cascade')
                ->onDelete('restrict');
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
        Schema::dropIfExists('outgoings');
    }
}
