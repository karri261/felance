<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reporter_id')->constrained('users')->onDelete('cascade'); 
            $table->foreignId('reported_user_id')->constrained('users')->onDelete('cascade');
            $table->text('title'); 
            $table->string('detail', 255)->nullable();
            $table->enum('status', ['pending', 'resolved'])->default('pending');
            $table->enum('admin_decision', ['none', 'block'])->default('none');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
