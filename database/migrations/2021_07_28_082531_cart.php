<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('total_price')->nullable();
            $table->enum('status',['shopping','pending','done','cancel'])->default('shopping');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('name_of_card')->nullable();
            $table->string('credit_card_number')->nullable();
            $table->enum('lang',['vi','en'])->default('vi');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
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
