<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->string('job_title', 200);
            $table->uuid('job_category')->foreign('job_category')->references('uuid')->on('job_categories');
            $table->integer('vacancies');
            $table->text('description');
            $table->double('salary_range1', 8, 2);
            $table->double('salary_range2', 8, 2);
            $table->boolean('show_salary')->default(1);
            $table->date('date_posted');
            $table->date('date_expiration');
            $table->timestamps();
            $table->integer('status');
            $table->boolean('is_reviewed')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
