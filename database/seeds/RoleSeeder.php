<?php

use App\Models\Student;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
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
        //reset the table
        if($driver == 'mysql') {
            DB::statement("SET FOREIGN_KEY_CHECKS=0");
            DB::table('model_has_roles')->truncate();
            DB::table('roles')->truncate();
        }

        $role = Role::create(['name' => 'Admin', 'guard_name' => 'api']);
        $role = Role::create(['name' => 'Bank', 'guard_name' => 'api']);
        $role = Role::create(['name' => 'Student', 'guard_name' => 'api']);
        $role = Role::create(['name' => 'CodeGen','guard_name' => 'api']);

        // $user1 = User::find(1);
        // $adminrole = Role::findByName('Admin');
        // $user1->assignRole([$adminrole->id]);

        // $user1 = User::find(2);
        // $bankrole = Role::findByName('Bank');
        // $user1->assignRole([$bankrole->id]);

        $students = Student::all();
        $studentrole = Role::findByName('Student', 'api');
        $students->each->assignRole([$studentrole->id]);
        // $students->assignRole([$studentrole->id]);

        // $user1 = User::find(4);
        // $codegent = Role::findByName('CodeGen');
        // $user1->assignRole([$codegent->id]);
    }
}
