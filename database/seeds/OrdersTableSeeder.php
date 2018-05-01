<?php

use App\Action;
use Illuminate\Database\Seeder;
use App\OrderStatus;
use App\Borrower;
use App\Customer;
use App\Property;
use App\Product;
use App\Order;
use App\Contact;

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

//        $customerUser = Customer::where('first_name', '=', 'Customer')
//            ->join('contacts', 'contacts.id',  '=', 'customers.customerable_id')
//            ->where('customers.customerable_type', '=', 'App\Contact')
//            ->first();

//        $customerUser->order()->save(new Order([
//            'product_id' => rand(1, $productsCount),
//            'property_id' => rand(1, $properties->random(1)->id),
//            'order_status_id' => rand(1, $orderStatusCount),
//            'enterprise_order_number' => 'EOR' . rand(2017,2018) . rand(1,12) . rand(1, 28) . '-' . rand(10000, 99999),
//            'sla_date' => $faker->dateTimeBetween('-30 days', '+30 days')->format('Y-m-d H:i:s')
//        ]));

//        Order::create([
//            'customer_id' => $customerUser->id,
//            'product_id' => rand(1, $productsCount),
//            'property_id' => rand(1, $properties->random(1)->id),
//            'order_status_id' => rand(1, $orderStatusCount),
//            'enterprise_order_number' => 'EOR' . rand(2017,2018) . rand(1,12) . rand(1, 28) . '-' . rand(10000, 99999),
//            'sla_date' => $faker->dateTimeBetween('-30 days', '+30 days')->format('Y-m-d H:i:s')
//        ]);


        // associate orders with a customer
        foreach ($customers as $customer) {
            $sla = $faker->dateTimeBetween('-30 days', '+30 days')->format('Y-m-d H:i:s');
            $customer->order()->save(new Order([
                'product_id' => rand(1, $productsCount),
                'property_id' => rand(1, $properties->random(1)->id),
                'order_status_id' => rand(1, $orderStatusCount),
                'enterprise_order_number' => 'EOR' . rand(2017,2018) . rand(1,12) . rand(1, 28) . '-' . rand(10000, 99999),
                'sla_date' => $sla
            ]));
        }

        // now associate borrowers with orders
        $orders = Order::all();
        $borrowers = Borrower::all();

        foreach ($orders as $order) {
            $order->borrowers()->save($borrowers->random(1));
            $order->borrowers()->save($borrowers->random(1));
        }

        // ok add an initial action using system user
        // status code active
        $orders = Order::all();

        foreach ($orders as $order) {
            $timestamp = $faker->dateTimeBetween('-7 days', '-3 days')->format('Y-m-d H:i:s');
            $order->actions()->save(
                new Action([
                    'user_id' => 4,
                    'action_type_id' => 1,
                    'notes' => 'Order Created By System',
                    'created_at' => $timestamp,
                    'updated_at' => $timestamp
                ])
            );
        }

        // Add an action to reflect current status
        $orders = Order::all();

        foreach ($orders as $order) {
            if($order->status->id != 1) {
                $timestamp = $faker->dateTimeBetween('-2 days', 'today')->format('Y-m-d H:i:s');
                $order->actions()->save(
                    new Action([
                        'user_id' => 4,
                        'action_type_id' => $order->status->id,
                        'notes' => 'updating order',
                        'created_at' => $timestamp,
                        'updated_at' => $timestamp
                    ])
                );
            }
        }
    }
}
