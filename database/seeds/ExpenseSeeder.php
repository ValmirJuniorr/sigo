<?php

use App\Models\Expensive\Expense;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        print Carbon::now()->format("H:m:s") . "\n";
        for ($i = 1 ; $i < 300; $i++){
            Expense::updateOrCreate(
                [
                    'id' => $i
                ],
                [
                    'id' => $i,
                    'expire_expense_date' => Carbon::now()->subDay(mt_rand(1,360))->format('Y-m-d'),
                    'number_of_days' => mt_rand(1,60),
                    'expire_expense_routine_date' => Carbon::now()->addDay(mt_rand(1,360))->format('Y-m-d'),
                    'price' => mt_rand(1,10000),
                    'expense_category_id' => mt_rand(2,4),
                    'description' => 'teste@teste',
                ]
            );
        }
        print Carbon::now()->format("H:m:s"). "\n";

        for ($i = 300 ; $i <= 600; $i++){
            Expense::updateOrCreate(
                [
                    'id' => $i
                ],
                [
                    'id' => $i,
                    'expire_expense_date' => Carbon::now()->addDay(mt_rand(1,360))->format('Y-m-d'),
                    'number_of_days' => mt_rand(1,60),
                    'expire_expense_routine_date' => Carbon::now()->addDay(mt_rand(1,360))->format('Y-m-d'),
                    'price' => mt_rand(1,10000),
                    'expense_category_id' => mt_rand(1,4),
                    'description' => 'teste@teste',
                ]
            );
        }

    }
}
