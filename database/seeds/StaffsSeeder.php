<?php

use App\Models\Staff;
use Illuminate\Database\Seeder;

class StaffsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Staff::updateOrCreate(
            [
                'id' => '1'
            ],
            [
                'id' => '1',
                'name' => 'Jose Lima',
                'document' => '1065416',
                'uf' => 'CE',
                'activated' => '1'
            ]
        );

        Staff::updateOrCreate(
            [
                'id' => '2'
            ],
            [
                'id' => '2',
                'name' => 'Juan Lima',
                'document' => '106544316',
                'uf' => 'CE',
                'activated' => '1'
            ]
        );

        Staff::updateOrCreate(
            [
                'id' => '3'
            ],
            [
                'id' => '3',
                'name' => 'Ronal Alves',
                'document' => '106541123',
                'uf' => 'CE',
                'activated' => '1'
            ]
        );

        Staff::updateOrCreate(
            [
                'id' => '4'
            ],
            [
                'id' => '4',
                'name' => 'Cristiano Dias',
                'document' => '1065442342',
                'uf' => 'CE',
                'activated' => '1'
            ]
        );
    }
}
