<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRunningInvestmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('running_investments', function (Blueprint $table) {
            $table->increments('tab_id');
            $table->uuid('id')->nullable();
            $table->string('email')->nullable();
            $table->string('amount')->nullable();
            $table->string('rate')->nullable();
            $table->string('profit')->nullable();
            $table->string('total')->nullable();
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
        Schema::dropIfExists('running_investments');
    }
}
