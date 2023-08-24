<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->longText('comment_detail')->nullable();
            $table->string('status')->default('passive')->nullable();
            $table->integer('review_score')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
