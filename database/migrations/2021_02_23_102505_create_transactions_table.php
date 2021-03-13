<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transactionId');
            $table->float('amount');
            $table->string('message')->nullable();
            $table->unsignedBigInteger('userId')->nullable();
            $table->unsignedBigInteger('entityId');
            $table->enum('paymentMethod', ['esewa', 'imepay', 'khalti', 'bank' ,'fonepay', 'paypal']);
            $table->string('currency',5)->default("NPR");
            $table->timestamps();

            $table->foreign('userId')->references('id')->on('users')->onDelete('set null');
            $table->foreign('entityId')->references('id')->on('entities')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
