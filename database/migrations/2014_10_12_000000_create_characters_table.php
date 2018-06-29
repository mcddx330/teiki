<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('nickname');
            $table->string('password');
            $table->unsignedSmallInteger('str');
            $table->unsignedSmallInteger('vit');
            $table->unsignedSmallInteger('dex');
            $table->unsignedSmallInteger('agi');
            $table->unsignedSmallInteger('int');
            $table->unsignedSmallInteger('mnd');
            $table->unsignedSmallInteger('con');
            $table->unsignedSmallInteger('dev');
            $table->unsignedSmallInteger('dir');
            $table->unsignedSmallInteger('exe');
            $table->unsignedSmallInteger('det');
            $table->unsignedSmallInteger('res');
            $table->unsignedSmallInteger('luc');
            $table->unsignedSmallInteger('gra');
            $table->rememberToken();
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
        Schema::dropIfExists('characters');
    }
}
