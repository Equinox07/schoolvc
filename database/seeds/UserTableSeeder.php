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

        DB::table('users')->insert([
                [
                    'name' => "Admin VVC",
                    'firstname' => "Admin",
                    "type" =>"admin",
                    'email' => "admin@vvc.com",
                    'password' => bcrypt('secret'),
                ],
                [
                    'name' => "Bank Teller Jane",
                    "slug" =>"teller-jane",
                    "type" =>"bank",
                    'email' => "bteller@vvc.com",
                    'password' => bcrypt('secret'),
                ],
                [
                    'name' => "Student John",
                    "slug" =>"student-john",
                    "type" =>"student",
                    'email' => "student@vvc.com",
                    'password' => bcrypt('secret'),
                ],
                [
                'name' => "Generator Mark",
                "slug" =>"gene-mark",
                "type" =>"customer",
                'email' => "generator@vvc.com",
                'password' => bcrypt('secret'),
                ]

            ]
            );
    }
}
