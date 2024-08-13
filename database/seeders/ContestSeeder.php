<?php

namespace Database\Seeders;

use App\Models\Contest;
use App\Models\Character;
use App\Models\Place;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ContestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contests = Contest::factory(20)->create();

        $users = User::all();
        $places = Place::all();

        $characters = Character::all();
        $heroes = $characters->where('enemy', '!=', 1);
        $enemies = $characters->where('enemy', '==', 1);

        foreach($contests as $c){
            $c -> place() -> associate($places -> random()) -> save();

            $hero = $heroes->random();
            $enemy = $enemies->random();



            $hp = fake()->numberBetween(1,20);
            if(is_null($c->win)){
                $hp2 = fake()->numberBetween(1,20);
                $c->characters()->attach($hero,['hero_hp'=>$hp ,'enemy_hp'=>$hp2]);
                $c->characters()->attach($enemy,['hero_hp'=>$hp ,'enemy_hp'=>$hp2]);
            }
            else if($c->win)
            {
                $c->characters()->attach($hero,['hero_hp'=>$hp,'enemy_hp'=>0]);
                $c->characters()->attach($enemy,['hero_hp'=>$hp ,'enemy_hp'=>0]);
            }
            else{
                $c->characters()->attach($hero,['hero_hp'=>0 ,'enemy_hp'=>$hp]);
                $c->characters()->attach($enemy,['hero_hp'=>0 ,'enemy_hp'=>$hp]);
            }
            $c->save();
            $c-> user() -> associate($hero->user) -> save();
        }

    }
}
