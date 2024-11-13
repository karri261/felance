<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobPostsTable extends Migration
{
    public function up()
    {
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id(); 
            $table->string('job_title'); 
            $table->string('company_name'); 
            $table->string('company_logo'); 
            $table->string('location'); 
            $table->decimal('salary_min', 10, 2); 
            $table->decimal('salary_max', 10, 2); 
            $table->integer('openings_position'); 
            $table->string('experience_required'); 
            $table->text('job_description');
            $table->text('responsibilities');
            $table->text('background');
            $table->enum('gender', ['Male', 'Female', 'Any']);
            $table->enum('categories', [
                'Accounting / Finance',
                'Design & Multimedia',
                'Education Training',
                'Health',
                'Restaurant / Food Service',
                'Telecommunications',
                'Others'
            ]);
            $table->enum('qualification', ['Certificate', 'Associate Degree', 'Bachelor Degree', 'Master Degree']); 
            $table->enum('career_level', ['Manager', 'Student', 'Junior', 'Senior']); 
            $table->enum('job_type', ['Freelance', 'Full Time', 'Internship', 'Part Time']); 
            $table->date('end_date')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_posts');
    }
}
