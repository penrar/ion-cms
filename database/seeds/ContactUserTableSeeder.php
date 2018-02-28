<?php
use Illuminate\Database\Seeder;

class ContactUserTableSeeder extends Seeder
{

    public function run()
    {
        $usersWhoAreContacts = 10;

        $contacts = \App\Contact::orderByRaw("RAND()")->limit(10)->get();

        $users = \App\User::where('name', '<>', 'Admin User')->where('name', '<>', 'Test User')->orderByRaw("RAND()")->limit(10)->get();

////        dd($contacts[0]);
////
//        for($i = 0; $i < $users->count(); $i++) {
////            dd($contacts[$i]->user());
//            $contacts[$i]->user()->save($users[$i]);
//        }

        $i = 0;

        foreach ($users as $user) {
            $user->contact()->save($contacts[$i]);
            $i++;
        }
    }
}