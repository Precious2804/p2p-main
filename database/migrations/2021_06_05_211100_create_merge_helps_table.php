<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMergeHelpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merge_helps', function (Blueprint $table) {
            $table->increments('merge_id');
            $table->uuid('id');
            $table->uuid('get_help_id');
            $table->string('amount');
            $table->string('acct_name');
            $table->string('acct_number');
            $table->string('bank');
            $table->string('phone');
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
        Schema::dropIfExists('merge_helps');
    }
}
