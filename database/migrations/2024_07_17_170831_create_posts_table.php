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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('author')->unique();
            $table->string('title')->unique();
            $table->string('sub_title')->nullable();
            $table->string('slug');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('main_photo')->nullable();
            $table->json('other_photos')->nullable();
            $table->enum('status', ['active', 'draft'])->default('active');
            $table->text('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
