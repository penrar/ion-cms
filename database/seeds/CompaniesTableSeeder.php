<?php

use Illuminate\Database\Seeder;
use App\Company;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $contacts = \App\Contact::all()->random(15);

        foreach($contacts as $contact) {
            $contact->company()->save(factory(Company::class)->make());
        }



    }
}
