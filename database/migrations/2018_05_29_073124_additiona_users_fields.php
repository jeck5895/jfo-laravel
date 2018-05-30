<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdditionaUsersFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Users', function (Blueprint $table) {
            $table->uuid('uuid')->after('id');
            $table->string('phonenumber', 150)->after('email')->nullable();
            $table->uuid('user_type')->foreign('user_type')->references('uuid')->on('user_types')->after('password');
            $table->boolean('is_activated')->default(0);
            $table->boolean('is_reviewed')->default(0);
            $table->boolean('is_active')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Users', function (Blueprint $table) {
            //
        });
    }
}
