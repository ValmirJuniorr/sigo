<?php

use App\Models\Procedure;
use Illuminate\Database\Seeder;

class ProceduresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Procedure::updateOrCreate(
            [
                'id' => '1'
            ],
            [
                'id' => '1',
                'name' => 'Extração',
                'price' => '95.80',
                'cost_price' => '38.95',
                'procedure_time' => '00:00:00',
                'staff_category_id' => '1',
            ]
        );


        Procedure::updateOrCreate(
            [
                'id' => '1'
            ],
            [
                'id' => '1',
                'name' => 'Tratamento de Canal',
                'price' => '450.00',
                'cost_price' => '220.00',
                'procedure_time' => '00:00:00',
                'staff_category_id' => '1',
            ]
        );

        Procedure::updateOrCreate(
            [
                'id' => '2'
            ],
            [
                'id' => '2',
                'name' => 'Raio-X',
                'price' => '50.00',
                'cost_price' => '30.00',
                'procedure_time' => '00:00:00',
                'staff_category_id' => '1',
            ]
        );

        Procedure::updateOrCreate(
            [
                'id' => '3'
            ],
            [
                'id' => '3',
                'name' => 'Restaurações',
                'price' => '80.00',
                'cost_price' => '35.00',
                'procedure_time' => '00:00:00',
                'staff_category_id' => '1',
            ]
        );

        Procedure::updateOrCreate(
            [
                'id' => '4'
            ],
            [
                'id' => '4',
                'name' => 'Anestesia',
                'price' => '35.00',
                'cost_price' => '15.00',
                'procedure_time' => '00:00:00',
                'staff_category_id' => '1',
            ]
        );


    }
}
