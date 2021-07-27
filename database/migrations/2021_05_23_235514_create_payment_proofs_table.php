<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentProofsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_proofs', function (Blueprint $table) {
            $table->increments('proof_id');
            $table->uuid('id');
            $table->uuid('get_help_id');
            $table->string('email');
            $table->string('pay_method');
            $table->string('dep_name');
            $table->date('paid_date');
            $table->string('amount');
            $table->string('proof');
            $table->string('rate');
            $table->string('profit');
            $table->string('total');
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
        Schema::dropIfExists('payment_proofs');
    }
}
