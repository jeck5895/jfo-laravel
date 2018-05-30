<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name', 150);
            $table->text('description');
            $table->string('address', 150);
            $table->uuid('location')->foreign('location')->references('uuid')->on('locations');
            $table->uuid('industry')->foreign('industry')->references('uuid')->on('industries');
            $table->text('logo');
            $table->text('banner');
            $table->string('telephone_no', 150);
            $table->string('url', 150);
            $table->string('first_name', 150);
            $table->string('last_name', 150);
            $table->string('position', 150);
            $table->string('phonenumber', 150);
            $table->string('phonenumber2', 150);
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
        Schema::dropIfExists('employers');
    }
}
