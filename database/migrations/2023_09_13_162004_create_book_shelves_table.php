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
        Schema::create('book_shelves', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('author');
            $table->year('published_year');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('book_id');
            $table->foreign('category_id')->references('category_id')->on('Categories');
            $table->foreign('user_id')->references('id')->on('Users');
            $table->foreign('book_id')->references('id')->on('Books');
            $table->string('description');
            $table->string('pdf')->nullable();
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
        Schema::dropIfExists('book_shelves');
    }
};
