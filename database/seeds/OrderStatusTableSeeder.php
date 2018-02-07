<?php

use Illuminate\Database\Seeder;
use App\OrderStatus;

class OrderStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderStatus::create([
            'status_name' => 'Active',
            'status_code' => 'active',
        ]);

        OrderStatus::create([
            'status_name' => 'Canceled',
            'status_code' => 'canceled',
        ]);

        OrderStatus::create([
            'status_name' => 'Delayed',
            'status_code' => 'delayed',
        ]);

        OrderStatus::create([
            'status_name' => 'Rejected',
            'status_code' => 'rejected',
        ]);

        OrderStatus::create([
            'status_name' => 'Completed',
            'status_code' => 'completed',
        ]);
    }
}
