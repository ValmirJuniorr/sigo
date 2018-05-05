<?php

use App\Models\Module;
use Illuminate\Database\Seeder;

class ModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Module::updateOrCreate(
            [
                'id' => 1
            ],
            [
                'id' => 1,
                'name' => 'Gestão de Prontuário',
                'description' => '-',
                'color' => '#3498db',
                'icon' => '',
            ]
        );

        Module::updateOrCreate(
            [
                'id' => 2
            ],
            [
                'id' => 2,
                'name' => 'Gestão Financeira',
                'description' => '-',
                'color' => '#27ae60',
                'icon' => '',
            ]
        );

        Module::updateOrCreate(
            [
                'id' => 3
            ],
            [
                'id' => 3,
                'name' => 'Gestão de Horários',
                'description' => '-',
                'color' => '#34495e',
                'icon' => '',
            ]
        );

        Module::updateOrCreate(
            [
                'id' => 4
            ],
            [
                'id' => 4,
                'name' => 'Utilitários',
                'description' => '-',
                'color' => '#34495e',
                'icon' => '',
            ]
        );

        Module::updateOrCreate(
            [
                'id' => 5
            ],
            [
                'id' => 5,
                'name' => 'Relatórios',
                'description' => '-',
                'color' => '#5352ed',
                'icon' => '',
            ]
        );

    }
}
