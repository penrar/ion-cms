<?php

use Illuminate\Database\Seeder;
use App\ActionType;

class ActionTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ActionType::create([
            'action_id' => 1,
            'action_name' => 'Active',
            'action_code' => 'active',
        ]);

        ActionType::create([
            'action_id' => 2,
            'action_name' => 'Canceled',
            'action_code' => 'canceled',
        ]);

        ActionType::create([
            'action_id' => 3,
            'action_name' => 'Delayed',
            'action_code' => 'delayed',
        ]);

        ActionType::create([
            'action_id' => 4,
            'action_name' => 'Rejected',
            'action_code' => 'rejected',
        ]);

        ActionType::create([
            'action_id' => 5,
            'action_name' => 'Completed',
            'action_code' => 'completed',
        ]);
    }
}
