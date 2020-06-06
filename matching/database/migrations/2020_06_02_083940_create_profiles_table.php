<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 20)->comment('名前');
            $table->integer('sex')->comment('性別');
            $table->integer('age')->comment('年齢');
            $table->string('profile')->comment('自己紹介');
            $table->integer('matching_age_from')->comment('マッチング希望年齢from');
            $table->integer('matching_age_to')->comment('マッチング希望年齢to');
            $table->string('icon')->nullable()->comment('アイコン画像');
            $table->integer('prefecture_id')->comment('都道府県id');
            $table->integer('user_id')->comment('ユーザーid');
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
        Schema::dropIfExists('profiles');
    }
}
