<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_details', function (Blueprint $table) {
            $table->id();
            $table->enum('accountType', ['esewa', 'imepay', 'khalti', 'bank', 'fonepay', 'paypal']);
            $table->string('accountName', 70);
            $table->string('accountNumber', 16);
            $table->unsignedBigInteger('bankId')->nullable();
            $table->unsignedBigInteger('entityId');
            $table->timestamps();

            $table->foreign('bankId')->references('id')->on('banks')->onDelete('cascade');
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
        Schema::dropIfExists('account_details');
    }
}