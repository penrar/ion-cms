<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // Add calls to Seeders here
        $this->call(RolesTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ContactTableSeeder::class);
        $this->call(ContactUserTableSeeder::class);
        $this->call(PropertiesTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(WorkProcessSeeder::class);
        $this->command->info('Admin User created with username admin@admin.com and password admin');
        $this->command->info('Test User created with username user@user.com and password user');
        $this->command->info('Customer User created with username customer@user.com and password user');
        $this->command->info('System user created with username system and password system');
		$this->call(CustomersTableSeeder::class);
		$this->call(BorrowersTableSeeder::class);
		$this->call(OrderStatusTableSeeder::class);
		$this->call(ProductsTableSeeder::class);
		$this->call(ActionTypesSeeder::class);
		$this->call(OrdersTableSeeder::class);
        Model::reguard();
    }
}
