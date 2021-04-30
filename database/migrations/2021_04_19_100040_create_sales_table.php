<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('customer_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('employee_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');
            $table->integer('quantity')->nullable();
            $table->decimal('price', 2)->nullable();
            $table->dateTime('sales_date')->nullable();
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
        Schema::dropIfExists('sales');
    }
}