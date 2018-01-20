<?php


use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::updateOrCreate(
            [
                'id' => 1
            ],
            [
                'id' => 1,
                'name' => 'Antonio Luiz de sousa',
                'address' => 'Rua unis siebra',
                'phone' => '',
                'cell_phone' => '88-999458723',
                'email' => 'antonio@htomail.com.br',
                'birth_date' => '2013-02-19',
                'city' => 'Crato',
                'neighborhood' => 'Centro',
                'cep' => '63220-000',
                'uf' => 'CE',
                'gender' => '1',
                'cpf' => '086388482743',
                'rg' => '12749827852',
            ]
        );

        Customer::updateOrCreate(
            [
                'id' => 2
            ],
            [
                'id' => 2,
                'name' => 'Paulo da costa silva',
                'address' => 'Rua unis siebra',
                'phone' => '',
                'cell_phone' => '88-999458723',
                'email' => 'paulo@htomail.com.br',
                'birth_date' => '2013-02-19',
                'city' => 'Crato',
                'neighborhood' => 'Centro',
                'cep' => '63220-000',
                'uf' => 'CE',
                'gender' => '1',
                'cpf' => '086382482743',
                'rg' => '12749137852',
            ]
        );

        Customer::updateOrCreate(
            [
                'id' => 3
            ],
            [
                'id' => 3,
                'name' => 'Damiao leonardo riberio silva',
                'address' => 'Rua unis siebra',
                'phone' => '',
                'cell_phone' => '88-999458723',
                'email' => 'damiao@htomail.com.br',
                'birth_date' => '2013-02-19',
                'city' => 'Crato',
                'neighborhood' => 'Centro',
                'cep' => '63220-000',
                'uf' => 'CE',
                'gender' => '1',
                'cpf' => '065888487743',
                'rg' => '06749827852',
            ]
        );
        Customer::updateOrCreate(
            [
                'id' => 4
            ],
            [
                'id' => 4,
                'name' => 'Caetano da costa silva',
                'address' => 'Rua unis siebra',
                'phone' => '',
                'cell_phone' => '88-999458723',
                'email' => 'caetano@htomail.com.br',
                'birth_date' => '2013-02-19',
                'city' => 'Crato',
                'neighborhood' => 'Centro',
                'cep' => '63220-000',
                'uf' => 'CE',
                'gender' => '1',
                'cpf' => '0863458482743',
                'rg' => '12849827852',
            ]
        );

        Customer::updateOrCreate(
            [
                'id' => 5
            ],
            [
                'id' => 5,
                'name' => 'Hallef vieira herbert',
                'address' => 'Rua unis siebra',
                'phone' => '',
                'cell_phone' => '88-999458723',
                'email' => 'hallef@htomail.com.br',
                'birth_date' => '2013-02-19',
                'city' => 'Crato',
                'neighborhood' => 'Centro',
                'cep' => '63220-000',
                'uf' => 'CE',
                'gender' => '1',
                'cpf' => '086917482749',
                'rg' => '12719427859',
            ]
        );

        Customer::updateOrCreate(
            [
                'id' => 6
            ],
            [
                'id' => 6,
                'name' => 'Valmir de oliveira',
                'address' => 'Rua unis siebra',
                'phone' => '',
                'cell_phone' => '88-999458723',
                'email' => 'valmir@htomail.com.br',
                'birth_date' => '2013-02-19',
                'city' => 'Crato',
                'neighborhood' => 'Centro',
                'cep' => '63220-000',
                'uf' => 'CE',
                'gender' => '1',
                'cpf' => '086205882843',
                'rg' => '12719372552',
            ]
        );
    }
}
