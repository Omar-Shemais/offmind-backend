<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void {
        Schema::table('messages', function (Blueprint $table) {

            $table->foreignId("from_user")->references("id")->on("users");
            $table->foreignId("to_user")->references("id")->on("users");
            $table->foreignId("chat_id")->references("id")->on("chats");
            $table->text("content");

        });
    }

    public function down(): void {
        Schema::dropIfExists('messages');
    }
};
