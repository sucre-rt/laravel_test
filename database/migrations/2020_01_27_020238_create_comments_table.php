<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            // $table->integer('post_id');     // 負の値も入る
            $table->unsignedInteger('post_id');     // 正の値のみ入る
            $table->string('body');
            $table->timestamps();

            $table
                ->foreign('post_id')        // post_idカラムに外部キー制約
                ->references('id')->on('posts')     // postsテーブルのidに紐付け
                ->onDelete('cascade');      // 親レコードが削除された場合一緒に削除される
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
