<?php
use Illuminate\Database\Seeder;

class ContactUserTableSeeder extends Seeder
{

    public function run()
    {
        $usersWhoAreContacts = 10;
        $contacts = \App\Contact::orderByRaw("RAND()")->limit(20)->get();
        $customer_user = \App\User::where('name', '=', 'Customer User')->first();
        $users = \App\User::where('name', '<>', 'Admin User')->where('name', '<>', 'Test User')->orderByRaw("RAND()")->limit(20)->get();
        $i = 0;

        $customer_contact = \App\Contact::create([
            'first_name' => 'Customer',
            'last_name' => 'User',
            'phone_number' => '402-555-2322',
            'address1' => '134 Birchwood Trl',
            'address2' => null,
            'city' => 'Omaha',
            'state' => 'NE',
            'zip_code' => '68111'
        ]);

        $customer_user->contact()->save($customer_contact);

        foreach ($users as $user) {
            $user->contact()->save($contacts[$i]);
            $i++;
        }
    }
}