<?php

use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id =1;

        $exist = DB::table('role_user')->where(['user_id'=>$user_id])->get();
        if(count($exist)  ==0) {

            for ($i = 1; $i < 33; $i++) {

                DB::table('role_user')->insert(array(
                    'user_id' => $user_id,
                    'role_id' => $i
                ));
            }
        }
    }
}
