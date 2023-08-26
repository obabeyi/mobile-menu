<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_code')->unique();
            $table->string('barcode')->unique();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('description')->nullable();
            $table->time('prepare_time')->nullable();
            $table->float('price', 15, 2)->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
