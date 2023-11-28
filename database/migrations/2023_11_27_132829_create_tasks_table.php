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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('todoList');
            $table->string('name', 255);
            $table->enum('progress', ['active', 'completed'])->default('active');
            $table->foreign('todoList')->references('id')->on('to_do_lists')->onDelete('cascade');
            $table->timestamps();

            $table->unique(['todoList', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
