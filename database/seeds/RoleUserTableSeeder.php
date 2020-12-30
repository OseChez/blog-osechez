<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $date = date('Y-m-d H:i:s');
        DB::table('role_user')->insert([
                  'role_id' => 1,
                  'user_id' => 1,
                  'created_at'=>$date,
                  'updated_at'=>$date,
                  ]);
    }
}
