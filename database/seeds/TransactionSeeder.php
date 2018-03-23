<?php

use App\Model\Transaction;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
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

            $price = mt_rand(40,180);

            Transaction::updateOrCreate(
                [
                    'id' => $i
                ],
                [
                    'id' => $i,
                    'price' => $price,
                    'cost_price' => $price * mt_rand(2,7) / 10,
                    'paid' => true,
                    'transaction_date' => Carbon::now()->subDay(mt_rand(1,90))->format('Y-m-d'),
                    'description' => 'teste@teste',
                    'customer_id' => '1',
                    'procedure_id' => mt_rand(1,4),
                    'staff_id' => '1',
                    'transaction_status_id' => '1',
                ]
            );
        }
    }
}
