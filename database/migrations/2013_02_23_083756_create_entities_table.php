<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entities', function (Blueprint $table) {
            $table->id();
            $table->string('name',70);
            $table->string('address')->nullable();
            $table->string('phone', 10);
            $table->string('logo')->nullable();
            $table->string('coverImage')->nullable();
            $table->string('email')->unique();
            $table->string('uniqueName',50);
            $table->enum('entityType', ['streamer', 'foundation', 'social worker', 'organization', 'personal' ]);
            $table->boolean('verified')->default(0);
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('entities');
    }
}
