<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllProvidedHelpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_provided_helps', function (Blueprint $table) {
            $table->increments('prov_id');
            $table->uuid('id');
            $table->string('email')->nullable();
            $table->string('amount')->nullable();
            $table->string('rate')->nullable();
            $table->string('profit')->nullable();
            $table->string('total')->nullable();
            $table->string('due_time')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('all_provided_helps');
    }
}
