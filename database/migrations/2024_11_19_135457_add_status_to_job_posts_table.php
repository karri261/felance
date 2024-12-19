<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        if (!Schema::hasColumn('job_posts', 'status')) {
            Schema::table('job_posts', function (Blueprint $table) {
                $table->enum('status', ['Waiting for approval', 'Approved', 'Rejected'])
                    ->default('Waiting for approval')
                    ->after('end_date');
            });
        }
    }

    public function down(): void
    {
        Schema::table('job_posts', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
