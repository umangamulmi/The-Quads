<?php

use App\Models\Actor;
use Illuminate\Database\Seeder;

class ActorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actors')->delete();
        $actors =[[
            'name' => 'Administrator',
            'pincode' => sha1('123456'),
            'role' => 'admin',
        ], [
            'name' => 'Manager',
            'pincode' => sha1('123457'),
            'role' => 'manager',
        ], [
            'name' => 'Cashier',
            'pincode' => sha1('123458'),
            'role' => 'cashier',
        ]];
        foreach ($actors as $actor){
            Actor::create($actor);
        }
    }
}