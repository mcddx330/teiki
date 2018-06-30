<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('own_chat_id');
            $table->unsignedBigInteger('res_chat_id')->nullable();
            $table->unsignedInteger('res_char_id')->nullable();
            $table->unsignedInteger('char_id');
            $table->string('name', 50);
            $table->string('icon_img');
            $table->text('chat_txt');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chats');
    }
}
