<?php

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
            DB::table('roles')->truncate();
        }

        $role = Role::create(['name' => 'Admin']);
        $role = Role::create(['name' => 'Bank']);
        $role = Role::create(['name' => 'Student']);
        $role = Role::create(['name' => 'CodeGen']);

        $user1 = User::find(1);
        $adminrole = Role::findByName('Admin');
        $user1->assignRole([$adminrole->id]);

        $user1 = User::find(2);
        $wholesalerrole = Role::findByName('Bank');
        $user1->assignRole([$wholesalerrole->id]);

        $user1 = User::find(3);
        $retailerrole = Role::findByName('Student');
        $user1->assignRole([$retailerrole->id]);

        $user1 = User::find(4);
        $customerrole = Role::findByName('CodeGen');
        $user1->assignRole([$customerrole->id]);
    }
}
