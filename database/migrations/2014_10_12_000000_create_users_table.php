<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('business_name', 100)->required();
            $table->string('email')->unique()->required();
            $table->string('password');
            $table->string('address')->required();
            $table->string('vat_number', 11)->required();
            $table->text('description')->nullable();
            $table->string('image')->required();
            $table->string('phone')->required();
            $table->timestamp('email_verified_at')->nullable();
            $table->time('opening_time')->required();
            $table->time('closing_time')->required();
            $table->string('closing_day', 20);
            $table->boolean('free_shipping')->required();
            $table->float('shipping_price', 4, 2);
            $table->string('slug')->unique();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}