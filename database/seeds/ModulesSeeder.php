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
                'description' => 'Gerenciamento do atendimento ao Cliente',
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
                'name' => 'Gestão de Horários',
                'description' => 'Gestão dos agendamentos dos horarios',
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
                'name' => 'Utilitários',
                'description' => 'Controler administrativo do sistema',
                'color' => '#ccc',
                'icon' => '',
            ]
        );
    }
}
