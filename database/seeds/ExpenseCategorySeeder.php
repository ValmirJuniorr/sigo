<?php

use App\Models\Expensive\ExpenseCategory;
use Illuminate\Database\Seeder;

class ExpenseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExpenseCategory::updateOrCreate(
            [
                'id' => 1
            ],
            [
                'id' => 1,
                'name' => 'Alimentação',
            ]
        );

        ExpenseCategory::updateOrCreate(
            [
                'id' => 2
            ],
            [
                'id' => 2,
                'name' => 'Funcionários',
            ]
        );

        ExpenseCategory::updateOrCreate(
            [
                'id' => 3
            ],
            [
                'id' => 3,
                'name' => 'Aluguel',
            ]
        );

        ExpenseCategory::updateOrCreate(
            [
                'id' => 4
            ],
            [
                'id' => 4,
                'name' => 'Diversos',
            ]
        );
    }
}
