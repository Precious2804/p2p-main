<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTotalHelpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_total_helps', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('totalAmount')->nullable();
            $table->string('totalProfit')->nullable();
            $table->string('sumTotal')->nullable();
            $table->string('noOfInvestments')->nullable();
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
        Schema::dropIfExists('user_total_helps');
    }
}
