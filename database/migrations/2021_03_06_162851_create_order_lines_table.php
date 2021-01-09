<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_lines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('CASCADE');
            $table->foreignId('product_id')->nullable();
            $table->string('name');
            $table->decimal('unit_price', 10, 2);
            $table->unsignedSmallInteger('quantity')->nullable();
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->decimal('discount', 4, 2)->default(0);
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
        Schema::dropIfExists('order_lines');
    }
}
