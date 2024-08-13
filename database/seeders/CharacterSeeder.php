<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Contest;
use App\Models\Character;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach($users as $user){
            $characters = Character::factory(3)->create();
            foreach($characters as $character){
                if($user->admin){
                    $is_enemy = rand(0,1);
                    $character->enemy=$is_enemy;
                    $character->save();
                    $character->user()->associate($user)->save();
                }
                else{
                    $character->enemy=0;
                    $character->save();
                    $character->user()->associate($user)->save();
                }
            }
        }
        /*
        $admins = $users->where('admin', '==', 1);
        $characters = Character::factory(15)->create();
        $characters->each(function($c) use ($users,$admins) {
            //ellenséges karakter csak admin felhasználó alatt legyen
            if($c->enemy==0){
                $c -> user() -> associate($users -> random()) -> save();
            }
            else{
                $c->user() -> associate($admins -> random()) ->save();
            }
        });
        */




    }
}
