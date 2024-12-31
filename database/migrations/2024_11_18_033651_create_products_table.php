<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('brand');
            $table->double('price', 8, 2); //8 is the total number of digits, 2 is the number of digits after the decimal point
            $table->string('image');
            $table->integer('quantity') -> unsigned(); //unsigned means that the quantity cannot be negative(only integer/digit)
            $table->string('categoryID');
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
        Schema::dropIfExists('products');
    }
};
