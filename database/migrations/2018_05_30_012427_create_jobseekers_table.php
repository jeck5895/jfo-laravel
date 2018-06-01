<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobseekersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobseekers', function (Blueprint $table) {
             $table->increments('id');
            $table->uuid('uuid');
            $table->string('first_name', 150);
            $table->string('last_name', 150);
            $table->text('resume_path')->nullable();
            $table->string('resume_filename', 150)->nullable();
            $table->string('address', 150)->nullable();
            $table->uuid('location')->foreign('location')->references('uuid')->on('locations');
            $table->date('birthdate')->nullable();
            $table->integer('age')->nullable();
            $table->string('birth_place', 150)->nullable();
            $table->string('gender', 50)->nullable();
            $table->string('height', 150)->nullable();
            $table->string('weight', 150)->nullable();
            $table->string('civil_status', 150)->nullable();
            $table->uuid('religion')->foreign('religion')->references('uuid')->on('religions')->nullable();
            $table->string('work_experience', 150)->nullable();
            $table->uuid('job_category')->foreign('job_category')->references('uuid')->on('job_categories');
            // $table->string('nationality', 150)
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobseekers');
    }
}
