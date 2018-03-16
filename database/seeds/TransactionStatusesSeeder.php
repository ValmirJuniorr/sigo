<?php

use App\Model\Transaction;
use App\Models\TransactionStatus;
use Illuminate\Database\Seeder;

class TransactionStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        TransactionStatus::updateOrCreate(
            [
                'id' => '1'
            ],
            [
                'id' => '1',
                'name' => 'Pendente',
            ]
        );

        TransactionStatus::updateOrCreate(
            [
                'id' => '2'
            ],
            [
                'id' => '2',
                'name' => 'Concluido',
            ]
        );

    }
}
