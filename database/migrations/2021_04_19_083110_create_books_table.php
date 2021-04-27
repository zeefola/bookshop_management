<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('book_title')->nullable();
            $table->foreignId('author_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('publisher_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');
            $table->string('book_edition')->nullable();
            $table->string('isbn_number')->nullable();
            $table->year('published_date', 4)->nullable();
            $table->string('published_country')->nullable();
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
        Schema::dropIfExists('books');
    }
}