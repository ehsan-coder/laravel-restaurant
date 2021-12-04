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
            $table->boolean('ready')->default(false);
            $table->boolean('status')->default(false);
            $table->string('type')->default('external');
            $table->decimal('total_price',10,2)->default(0);
            $table->integer('table_number')->nullable();
            $table->string('payment_method')->nullable();
            
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('driver_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade')->nullable();
            // $table->foreignId('cart_id')->constrained('carts')->onUpdate('cascade')->onDelete('cascade');
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
