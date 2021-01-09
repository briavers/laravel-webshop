<?php

use App\Models\Enums\OrderStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('address_id')->nullable()->constrained();
            $table->string("number", 12)->unique()->index();
            $table->uuid('status')->default(OrderStatusEnum::CREATED);
            $table->string('payment_id')->nullable()->index();
            $table->decimal('total_inclusive', 10, 2);
            $table->decimal('total_exclusive', 10, 2);
            $table->decimal('total_vat', 10, 2);
            $table->boolean('present')->default(false);
            $table->timestamp('paid_at')->nullable();
            $table->timestamp('shipped_at')->nullable();
            $table->timestamp('received_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->timestamp('disputed_at')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
