<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('password_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // ログイン中のユーザーと紐づけ
            $table->string('account_name');     // アカウントの名前
            $table->string('login_id');         // メールアドレスやログインID
            $table->text('password');           // 暗号化したパスワード
            $table->text('memo')->nullable();   // 任意のメモ
            $table->string('category')->nullable(); // カテゴリ（仕事、プライベートなど）
            $table->string('login_url')->nullable(); // ログインURL
            $table->timestamps();               // 作成日時・更新日時
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('password_items');
    }
};
