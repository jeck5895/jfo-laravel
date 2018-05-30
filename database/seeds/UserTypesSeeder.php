<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\UserType;

class UserTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('user_types')->insert([
        //     'type' => 'Administrator'
        // ]);
        UserType::create([
            'type' => 'Administrator'
        ]);

        UserType::create([
            'type' => 'Jobseeker'
        ]);

        UserType::create([
            'type' => 'Employer'
        ]);
    }
}
