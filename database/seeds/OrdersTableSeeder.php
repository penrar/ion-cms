<?php

use Illuminate\Database\Seeder;
use App\OrderStatus;
use App\Borrower;
use App\Customer;
use App\Property;
use App\Product;
use App\Order;

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
        $customers = Customer::all();
        $properties = Property::all();
        $productsCount = Product::all()->count();
        $faker = Faker\Factory::create();

        // associate orders with a customer
        foreach ($customers as $customer) {
            $customer->order()->save(new Order([
                'product_id' => rand(1, $productsCount),
                'property_id' => rand(1, $properties->random(1)->id),
                'order_status_id' => rand(1, $orderStatusCount),
                'enterprise_order_number' => 'EOR' . rand(2017,2018) . rand(1,12) . rand(1, 28) . '-' . rand(10000, 99999),
                'sla_date' => $faker->dateTimeBetween('-30 days', '+30 days')->format('Y-m-d H:i:s')
            ]));
        }

        // now associate borrowers with orders
        $orders = Order::all();
        $borrowers = Borrower::all();

        foreach ($orders as $order) {
            $order->borrowers()->save($borrowers->random(1));
        }
    }
}
