<?php

use App\Models\StaffCategory;
use Illuminate\Database\Seeder;

class StaffCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        StaffCategory::updateOrCreate(
            [
                'id' => '1'
            ],
            [
                'id' => '1',
                'name' => 'Odontológico',
                'activated' => '1'
            ]
        );

        StaffCategory::updateOrCreate(
            [
                'id' => '2'
            ],
            [
                'id' => '2',
                'name' => 'Exame',
                'activated' => '1'
            ]
        );

        StaffCategory::updateOrCreate(
            [
                'id' => '3'
            ],
            [
                'id' => '3',
                'name' => 'Piscólogo',
                'activated' => '1'
            ]
        );


    }
}
