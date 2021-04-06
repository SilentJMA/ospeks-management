<?php

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
            $table->decimal('product_price');
            $table->string('product_quantity');
            $table->string('shipping_cost');
            $table->decimal('order_cost');
            $table->string('shipping_country');
            $table->string('shipping_tracking');
            $table->date('order_date')->nullable();
            $table->longText('note');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('shipping_id')->constrained()->onDelete('cascade');
            $table->foreignId('supplier_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('status_id')->constrained('status')->onDelete('cascade');
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
