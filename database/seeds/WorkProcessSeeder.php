<?php

use Illuminate\Database\Seeder;
use App\WorkProcess;

class WorkProcessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WorkProcess::create([
            'work_process_type' => 'Order Fee',
            'price' => 25.50
        ]);

        WorkProcess::create([
            'work_process_type' => 'Research Fee',
            'price' => 35.50
        ]);

        WorkProcess::create([
            'work_process_type' => 'LVD Fee',
            'price' => 15.00
        ]);

        WorkProcess::create([
            'work_process_type' => 'Service Fee',
            'price' => 10.00
        ]);

        WorkProcess::create([
            'work_process_type' => 'Insurance Fee',
            'price' => 90.00
        ]);

        WorkProcess::create([
            'work_process_type' => 'Closing Fee',
            'price' => 45.00
        ]);
    }
}
