<?php

use Illuminate\Database\Seeder;

class BorrowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contacts = \App\Contact::all()->random(10);

        foreach($contacts as $contact) {
            $contact->borrower()->save(new \App\Borrower());
        }

        $companies = App\Company::all()->random(10);

        foreach ($companies as $company) {
            $company->borrower()->save(new \App\Borrower());
        }
    }
}
