<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('assistants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('api_key_id')->constrained()->onDelete('cascade');
            $table->string('assistant_id'); // OpenAI Assistant ID
            $table->string('name');
            $table->string('alphanumeric_name')->unique();
            $table->text('instructions');
            $table->string('model');
            $table->json('tools')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assistants');
    }
};