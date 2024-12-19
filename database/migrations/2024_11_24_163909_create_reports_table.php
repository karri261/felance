<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasTable('reports')) {
            Schema::create('reports', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('reporter_id');
                $table->unsignedBigInteger('reported_user_id');
                $table->text('title');
                $table->enum('status', ['pending', 'resolved'])->default('pending');
                $table->enum('admin_decision', ['none', 'block'])->default('none');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
