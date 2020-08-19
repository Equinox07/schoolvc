<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentTableSeeder extends Seeder
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
            DB::table('students')->truncate();
        }

        DB::table('students')->insert([
                [
                    'firstname' => "Student",
                    'lastname' => "Jane",
                    "slug" =>"student-jane",
                    "type" =>"student",
                    "mobile" =>"0255563652",
                    'email' => "studentjane@vvc.com",
                    'password' => bcrypt('secret'),
                ],
                [
                    'firstname' => "Student",
                    'lastname' => "Mary",
                    "slug" =>"student-mary",
                    "type" =>"student",
                    "mobile" =>"0255563652",
                    'email' => "studentmary@vvc.com",
                    'password' => bcrypt('secret'),
                ],
                [
                    'firstname' => "Student",
                    'lastname' => "Freda",
                    "slug" =>"student-freda",
                    "type" =>"student",
                    "mobile" =>"0255563652",
                    'email' => "studentfreda@vvc.com",
                    'password' => bcrypt('secret'),
                ],
            ]
            );
    }
}
