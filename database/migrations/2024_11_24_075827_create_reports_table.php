<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id(); // Tạo cột ID tự tăng
            $table->foreignId('reporter_id')->constrained('users')->onDelete('cascade'); // Khóa ngoại tới bảng users
            $table->foreignId('reported_user_id')->constrained('users')->onDelete('cascade'); // Khóa ngoại tới bảng users
            $table->text('title'); // Lý do báo cáo
            $table->enum('status', ['pending', 'resolved'])->default('pending'); // Trạng thái báo cáo
            $table->enum('admin_decision', ['none', 'block'])->default('none'); // Quyết định của admin
            $table->timestamps(); // Created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
