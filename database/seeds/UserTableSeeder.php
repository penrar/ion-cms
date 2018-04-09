<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

	public function run()
	{
        factory(\App\User::class, 20)->create();

		\App\User::create([
			'name' => 'Admin User',
			'username' => 'admin_user',
			'email' => 'admin@admin.com',
			'password' => bcrypt('admin'),
			'role_id' => 1,
		]);

		\App\User::create([
			'name' => 'Test User',
			'username' => 'test_user',
			'email' => 'user@user.com',
			'password' => bcrypt('user'),
            'role_id' => 2,
		]);

        \App\User::create([
            'name' => 'Customer User',
            'username' => 'customer_user',
            'email' => 'customer@user.com',
            'password' => bcrypt('user'),
            'role_id' => 3,
        ]);
    }

}
