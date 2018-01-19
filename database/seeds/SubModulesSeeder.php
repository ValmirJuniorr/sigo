<?php

use App\Models\SubModule;
use Illuminate\Database\Seeder;

class SubModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubModule::updateOrCreate(
            [
                'id' => 1
            ],
            [
                'id' => 1,
                'name' => 'Usuários',
                'url' => 'UserController@read_user',
                'icon' => 'fa fa-user',
                'module_id' => 5,
                'sub_module_category_id' => 1
            ]
        );

        SubModule::updateOrCreate(
            [
                'id' => 2
            ],
            [
                'id' => 2,
                'name' => 'Despesas',
                'url' => '',
                'icon' => '',
                'module_id' => NULL,
                'sub_module_category_id' => NULL
            ]
        );
    }
}
