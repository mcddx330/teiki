<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('name_first', 16);
            $table->string('name_last', 16);
            $table->boolean('is_foreigner')->default(0);
            $table->string('password', 60);
            $table->string('profile_title', 32)->nullable();
            $table->text('profile_txt')->nullable();
            $table->string('profile_img')->nullable();
            $table->unsignedBigInteger('level');
            $table->unsignedBigInteger('hp');
            $table->unsignedBigInteger('attack');
            $table->unsignedBigInteger('defense');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['name_first', 'name_last'], 'characters_name');
            $table->index('profile_title', 'characters_profile_title');
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
