<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_supports', function (Blueprint $table) {
            $table->id();
            $table->uuid('unique_id');
            $table->string('email');
            $table->string('ticket_type');
            $table->string('subject')->nullable();
            $table->longText('message')->nullable();
            $table->string('attach')->nullable();
            $table->string('reply')->nullable();
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
        Schema::dropIfExists('chat_supports');
    }
}
