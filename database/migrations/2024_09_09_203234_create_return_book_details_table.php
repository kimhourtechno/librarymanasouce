<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('return_book_details', function (Blueprint $table) {
            $table->id('returndetail_id');
            $table->unsignedBigInteger('return_id');
            $table->unsignedBigInteger('book_id');
            $table->integer('qty_return');
            $table->integer('remaining');
            $table->timestamps(); // This adds created_at and updated_at columns

            $table->foreign('return_id')->references('id')->on('return_books')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('return_book_details');
    }
};
