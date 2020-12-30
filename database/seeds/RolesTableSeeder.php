<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$date = date('Y-m-d H:i:s');
        DB::table('roles')->insert([
                  'name' => 'Administrator@Osechez',
                  'slug' => 'admnistra7or',
                  'description'=>'Usuario con todos los privilegios',
                  'special'=>'all-access',
                  'created_at'=>$date,
                  'updated_at'=>$date,
                  ]);
    }
}
