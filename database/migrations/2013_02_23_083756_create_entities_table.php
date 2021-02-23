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
            $table->string('adress');
            $table->string('number', 10);
            $table->string('logo');
            $table->string('coverImage');
            $table->string('email');
            $table->string('unique_name',50);
            $table->enum('entity_type', ['streamer', 'foundation', 'social worker', 'organization', 'personal' ]);
            $table->boolean('verified');
            $table->boolean('status');
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
