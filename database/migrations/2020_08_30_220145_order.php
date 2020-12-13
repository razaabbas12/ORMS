<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('price');

            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('users');

            $table->unsignedBigInteger('tailor_id');
            $table->foreign('tailor_id')->references('id')->on('users');

            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('product');            

            $table->enum('size', ['XS','S','M','L','XL']);

            $table->integer('length')->nullable();

            $table->integer('bust')->nullable();
            $table->integer('shoulder_width')->nullable();
            $table->integer('hip')->nullable();
            $table->integer('hem')->nullable();
            $table->integer('armhole')->nullable();
            $table->integer('sleeve_length')->nullable();


            $table->enum('status', ['pending','accepted','in-progress','dispatched','recieved','cancelled'])->default('pending');

            $table->date('start_date');
            $table->date('end_date');

            $table->string('combination');
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
        Schema::dropIfExists('order');
    }
}
