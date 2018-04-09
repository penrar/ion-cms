<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer_user = \App\Contact::where('first_name', '=', 'Customer')->first();
        $customer_user->customer()->save(new \App\Customer());

        $contacts = \App\Contact::all()->random(30);

        foreach($contacts as $contact) {
            $contact->customer()->save(new \App\Customer());
        }

        $companies = App\Company::all()->random(10);

        foreach($companies as $company) {
            $company->customer()->save(new App\Customer());
        }
    }
}
