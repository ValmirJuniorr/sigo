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
                'name' => 'IPTU',
                'description' => 'Controle e gestão do IPTU do município',
                'color' => '#ccc',
                'icon' => '',
            ]
        );

        Module::updateOrCreate(
            [
                'id' => 2
            ],
            [
                'id' => 2,
                'name' => 'Financeiro',
                'description' => 'Controle e gestão das financeias',
                'color' => '#ccc',
                'icon' => '',
            ]
        );

        Module::updateOrCreate(
            [
                'id' => 3
            ],
            [
                'id' => 3,
                'name' => 'Recursos Humanos',
                'description' => 'Gestão de pessoas do município',
                'color' => '#ccc',
                'icon' => '',
            ]
        );

        Module::updateOrCreate(
            [
                'id' => 4
            ],
            [
                'id' => 4,
                'name' => 'Suprimentos',
                'description' => 'Controle e gestão do recursos do município',
                'color' => '#ccc',
                'icon' => '',
            ]
        );

        Module::updateOrCreate(
            [
                'id' => 5
            ],
            [
                'id' => 5,
                'name' => 'Utilitários',
                'description' => 'Controler administrativo do sistema',
                'color' => '#ccc',
                'icon' => '',
            ]
        );
    }
}
