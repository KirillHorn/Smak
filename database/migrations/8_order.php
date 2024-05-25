<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->integer('amount');
            $table->foreignId('id_users')->references('id')->on('users');
            $table->string('comment', 80)->nullable();
            $table->string('paymant', 100);
            $table->foreignId('id_street')->references('id')->on('streets');
            $table->foreignId('id_brach')->references('id')->on('branchs');
            $table->string('location_details',100);
            $table->time('time_order')->nullable();
            $table->foreignId('id_status')->references('id')->on('statuses');
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
};
