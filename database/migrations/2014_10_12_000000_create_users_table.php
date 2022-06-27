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
            $table->string('business_name', 100)->nullable(false);
            $table->string('email')->unique()->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('address')->nullable(false);
            $table->string('vat_number', 11)->nullable(false);
            $table->text('description')->nullable();
            $table->string('image')->nullable(false);
            $table->string('phone')->nullable(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->time('opening_time')->nullable(false);
            $table->time('closing_time')->nullable(false);
            $table->string('closing_day')->nullable(false);
            $table->float('shipping_price', 4, 2)->nullable(false);
            $table->string('slug')->unique()->nullable(false);
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
