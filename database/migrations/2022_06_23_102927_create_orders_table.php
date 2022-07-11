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
            $table->string('customer_name')->nullable(false);
            $table->string('customer_surname')->nullable(false);
            $table->string('customer_address')->nullable(false);
            $table->string('customer_phone')->nullable(false);
            $table->string('customer_email')->nullable(false);
            $table->text('customer_note')->nullable();
            $table->float('total_price', 10, 2)->nullable(false);
            $table->timestamps();
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")
                ->references("id")
                ->on("users");
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
