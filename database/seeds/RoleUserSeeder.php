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
        $i = count($exist);
        for ($i += 1; $i <= 35; $i++) {
            DB::table('role_user')->insert(array(
                'user_id' => $user_id,
                'role_id' => $i
            ));
        }
    }
}
