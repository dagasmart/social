<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 社交账号绑定表
        Schema::create('social_account', function (Blueprint $table) {
            $table->comment('基础-社交账号绑定表');
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->string('provider');           // google, github, wechat, qq, dingtalk, feishu
            $table->string('provider_id');       // 第三方用户 ID
            $table->string('nickname')->nullable();
            $table->string('avatar')->nullable();
            $table->text('access_token')->nullable();
            $table->text('refresh_token')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();

            // 同一平台 + provider_id 唯一
            $table->unique(['provider', 'provider_id']);
            // 一个用户同平台只能绑定一个
            $table->unique(['user_id', 'provider']);
        });

        // 登录历史表
        Schema::create('social_history', function (Blueprint $table) {
            $table->comment('基础-登录历史表');
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->string('provider')->nullable(); // null = 邮箱密码登录
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamp('login_at');
            $table->timestamps();

            $table->index(['user_id', 'login_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('social_history');
        Schema::dropIfExists('social_account');
    }
};
