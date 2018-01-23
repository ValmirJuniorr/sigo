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

        Customer::updateOrCreate(
            [
                'id' => 7
            ],
            [
                'id' => 7,
                'name' => 'jose de oliveira',
                'address' => 'Rua unis siebra',
                'phone' => '',
                'cell_phone' => '88-999458723',
                'email' => 'jose@htomail.com.br',
                'birth_date' => '2013-02-19',
                'city' => 'Crato',
                'neighborhood' => 'Centro',
                'cep' => '63220-000',
                'uf' => 'CE',
                'gender' => '1',
                'cpf' => '08620534843',
                'rg' => '127234272552',
            ]
        );

        Customer::updateOrCreate(
            [
                'id' => 8
            ],
            [
                'id' => 8,
                'name' => 'pedro de oliveira',
                'address' => 'Rua unis siebra',
                'phone' => '',
                'cell_phone' => '88-999458723',
                'email' => 'pedro@htomail.com.br',
                'birth_date' => '2013-02-19',
                'city' => 'Crato',
                'neighborhood' => 'Centro',
                'cep' => '63220-000',
                'uf' => 'CE',
                'gender' => '1',
                'cpf' => '086297262843',
                'rg' => '12719102852',
            ]
        );

        Customer::updateOrCreate(
            [
                'id' => 9
            ],
            [
                'id' => 9,
                'name' => 'Maria de oliveira',
                'address' => 'Rua unis siebra',
                'phone' => '',
                'cell_phone' => '88-999458723',
                'email' => 'maria@htomail.com.br',
                'birth_date' => '2013-02-19',
                'city' => 'Crato',
                'neighborhood' => 'Centro',
                'cep' => '63220-000',
                'uf' => 'CE',
                'gender' => '0',
                'cpf' => '08620588978',
                'rg' => '1271937567',
            ]
        );

        Customer::updateOrCreate(
            [
                'id' => 10
            ],
            [
                'id' => 10,
                'name' => 'Rosana de oliveira',
                'address' => 'Rua unis siebra',
                'phone' => '',
                'cell_phone' => '88-999458723',
                'email' => 'rosana@htomail.com.br',
                'birth_date' => '2013-02-19',
                'city' => 'Crato',
                'neighborhood' => 'Centro',
                'cep' => '63220-000',
                'uf' => 'CE',
                'gender' => '0',
                'cpf' => '086205881026',
                'rg' => '121027572552',
            ]
        );

        Customer::updateOrCreate(
            [
                'id' => 11
            ],
            [
                'id' => 11,
                'name' => 'Felipe de oliveira',
                'address' => 'Rua unis siebra',
                'phone' => '',
                'cell_phone' => '88-999458723',
                'email' => 'felipe@htomail.com.br',
                'birth_date' => '2013-02-19',
                'city' => 'Crato',
                'neighborhood' => 'Centro',
                'cep' => '63220-000',
                'uf' => 'CE',
                'gender' => '1',
                'cpf' => '016205882843',
                'rg' => '00719372552',
            ]
        );
    }
}
