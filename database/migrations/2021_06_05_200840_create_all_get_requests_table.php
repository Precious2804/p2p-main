<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllGetRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_get_requests', function (Blueprint $table) {
            $table->id();
            $table->uuid('get_help_id');
            $table->string('email');
            $table->string('acct_name');
            $table->string('acct_number');
            $table->string('bank');
            $table->string('phone');
            $table->string('amount');
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
        Schema::dropIfExists('all_get_requests');
    }
}
