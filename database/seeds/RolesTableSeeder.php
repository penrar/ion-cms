<?php
use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('roles')->delete();

        Role::create([
            'role_name' => 'Administrator',
            'role_code' => 'admin',
            'role_level' => 50
        ]);

        Role::create([
            'role_name' => 'Representative',
            'role_code' => 'rep',
            'role_level' => 30
        ]);

        Role::create([
            'role_name' => 'Customer',
            'role_code' => 'customer',
            'role_level' => 10
        ]);

        Role::create([
            'role_name' => 'Locked',
            'role_code' => 'locked',
            'role_level' => 1
        ]);
    }

}
