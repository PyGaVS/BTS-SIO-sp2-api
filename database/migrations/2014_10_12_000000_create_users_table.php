<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('kindness_score');
            $table->foreignId('region')->constrained();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_blacklist_user');
        Schema::dropIfExists('user_follow_user');
        Schema::dropIfExists('messages');
        Schema::dropIfExists('sanctions');
        Schema::dropIfExists('chat_user');
        Schema::dropIfExists('user_like_message');
        Schema::dropIfExists('user_hide_message');
        Schema::dropIfExists('users');
    }
};
