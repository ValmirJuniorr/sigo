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
            Transaction::updateOrCreate(
                [
                    'id' => $i
                ],
                [
                    'id' => $i,
                    'price' => mt_rand(40,180),
                    'paid' => true,
                    'description' => 'teste@teste',
                    'customer_id' => '1',
                    'procedure_id' => mt_rand(1,5),
                    'staff_id' => '1',
                    'transaction_status_id' => '1',
                ]
            );
        }
    }
}
