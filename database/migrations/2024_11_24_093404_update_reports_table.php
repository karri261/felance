<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reports', function (Blueprint $table) {
            // Đổi tên cột 'reason' thành 'title'
            $table->renameColumn('reason', 'title');

            // Thêm cột 'detail' kiểu VARCHAR(255)
            $table->string('detail', 255)->nullable()->after('title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reports', function (Blueprint $table) {
            // Đổi lại tên cột 'title' thành 'reason'
            $table->renameColumn('title', 'reason');

            // Xóa cột 'detail'
            $table->dropColumn('detail');
        });
    }
}
