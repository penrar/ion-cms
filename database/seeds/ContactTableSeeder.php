<?php

use Illuminate\Database\Seeder;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Contact::create([
            'user_id' => 3,
            'first_name' => 'Customer',
            'last_name' => 'User',
            'phone_number' => '402-555-2322',
            'address1' => '333 Westhaven Trl',
            'city' => 'Omaha',
            'state' => 'NE',
            'zip_code' => '68105'
        ]);

        factory(App\Contact::class, 80)->create();
    }
}
