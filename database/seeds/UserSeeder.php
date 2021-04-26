<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => "Jonas Jonaitis",
                'email'=>'test@test.lt',
                'password'=>Hash::make('testas123')
            ],
            [
                'name' => "Petras Petraitis",
                'email'=>'test1@test.lt',
                'password'=>Hash::make('testas123')
            ]
        ]);
    }
}
