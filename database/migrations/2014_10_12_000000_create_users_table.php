<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('username')->nullable()->unique();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('gender')->nullable();
            $table->string('ref_id')->nullable();
            $table->string('password');
            $table->string('acct_name')->nullable();
            $table->string('acct_number')->nullable()->unique();
            $table->string('acct_type')->nullable();
            $table->string('bank')->nullable();
            $table->string('image')->nullable()->default('blank-image.png');
            $table->string('isAdmin')->nullable()->default(0);
            // $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
