<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $connection = config('database.default');
        $driver = config("database.connections.{$connection}.driver");

        $faker = Factory::create();
        //reset the table
        if($driver == 'mysql') {
            DB::statement("SET FOREIGN_KEY_CHECKS=0");
            DB::table('users')->truncate();
        }

        DB::table('students')->insert([
                [
                    'firstname' => "Student",
                    'lastname' => "John",
                    "slug" =>"student-john",
                    "type" =>"student",
                    "mobile" =>"0255563652",
                    'email' => "student@vvc.com",
                    'password' => bcrypt('secret'),
                ],
            ]
            );
    }
}
