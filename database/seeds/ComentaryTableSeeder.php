<?php

use App\Comentary;
use App\Entry;
use App\User;
use Illuminate\Database\Seeder;

class ComentaryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $entries = Entry::all();

        foreach($users as $user){
            foreach($entries as $entry){
                factory(Comentary::class,1)->create([
                    'user_id'=> $user->id,
                    'entry_id'=> $entry->id
                ]);
            }
        }
    }
}
