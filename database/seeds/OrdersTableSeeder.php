<?php

use Illuminate\Database\Seeder;
use App\OrderStatus;
use App\Borrower;
use App\Customer;
use App\Property;


class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orderStatusCount = OrderStatus::all()->count();
        $borrowersCount = Borrower::all()->count();
        $customerCount = Customer::all()->count();
        $properties = Property::all();
        $faker = Faker\Factory::create();
    }
}
