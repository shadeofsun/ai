<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('threads', function (Blueprint $table) {
            $table->id();
            $table->string('thread_id'); // OpenAI Thread ID
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('assistant_id')->constrained()->onDelete('cascade');
            $table->foreignId('scenario_id')->constrained()->onDelete('cascade');
            $table->json('metadata')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('threads');
    }
};