<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->json('name')->nullable();
            $table->json('description')->nullable();
            $table->decimal('unit_price', 10, 2)->nullable();
            $table->unsignedSmallInteger('stock')->nullable();
            $table->json('size')->nullable();
            $table->json('color')->nullable();
            $table->string('color_code', 7)->nullable();
            $table->decimal('discount', 4, 2)->nullable();
            $table->unsignedTinyInteger('cost')->nullable();
            $table->boolean('promoted')->default(false)->index();
            $table->uuid('uuid')->index();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('products', function (Blueprint $table)
        {
            $table->foreign('parent_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->index('parent_id');
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
}
