<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('branch_id');
            $table->string('service');
            $table->string('transportation');
            $table->string('pickup_location')->nullable();   
            $table->string('dropin_location');
            $table->integer('kilo');
            $table->date('pickupdate');
            $table->integer('status')->default(false);
            $table->integer('washed')->default(false);
            $table->integer('done')->default(false);
            $table->timestamps();

            $table->index('customer_id');
            $table->index('branch_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
