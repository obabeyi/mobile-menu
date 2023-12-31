<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->integer('parent')->nullable();
            $table->string('status')->nullable();
            $table->string('order')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
