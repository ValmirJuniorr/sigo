<?php

use App\Models\SubModuleCategory;
use Illuminate\Database\Seeder;

class SubModuleCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubModuleCategory::updateOrCreate(
            [
                'id' => 1
            ],
            [
                'id' => 1,
                'name' => 'Cadastro'
            ]
        );
    }
}
