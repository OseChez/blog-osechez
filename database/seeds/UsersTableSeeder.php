<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
                  'id' => 1,
                  'name' => 'Osechez',
                  'email' =>'osechez@gmail.com' ,
                  'password' =>Hash::make('password'),
                  ]);
    }
}
