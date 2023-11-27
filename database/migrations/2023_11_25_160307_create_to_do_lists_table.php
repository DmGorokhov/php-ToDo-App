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
        Schema::create('to_do_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner');
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->enum('progress', ['active', 'completed'])->default('active');
            $table->enum('todo_status', ['private', 'public'])->default('private');
            $table->foreign('owner')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();

            $table->unique(['owner', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     */ 
    public function down(): void
    {
        Schema::dropIfExists('to_do_lists');
    }
};
