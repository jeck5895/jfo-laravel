<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAccountIdToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobseekers', function (Blueprint $table) {
            $table->uuid('account_id')->foreign('account_id')->references('uuid')->on('users')->after('uuid')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobseekers', function (Blueprint $table) {
            $table->dropColumn('account_id');
        });
    }
}
