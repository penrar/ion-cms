<?php
use Illuminate\Database\Seeder;

class ContactUserTableSeeder extends Seeder
{

    public function run()
    {
        $usersWhoAreContacts = 10;
        $contacts = \App\Contact::orderByRaw("RAND()")->limit(20)->get();
        $users = \App\User::where('name', '<>', 'Admin User')->where('name', '<>', 'Test User')->orderByRaw("RAND()")->limit(20)->get();
        $i = 0;

        foreach ($users as $user) {
            $user->contact()->save($contacts[$i]);
            $i++;
        }
    }
}