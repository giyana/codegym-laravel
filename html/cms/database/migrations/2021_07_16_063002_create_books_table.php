<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //upメソッド
    //新しいテーブル/カラム/インデックスをデータベースに追加するために使用
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id'); //カラム定義
            $table->string('item_name');
            $table->integer('item_number');
            $table->integer('item_amount');
            $table->datetime('published');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    //downメソッド
    //upメソッドで作成したテーブルを削除する。
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
