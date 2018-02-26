<?php

use App\Model\Procedure;
use App\Model\Transaction;
use App\Models\Expensive\Expense;
use App\Models\Customer;
use App\Models\Expensive\ExpenseCategory;
use App\Models\Role;
use App\Models\Staff;
use App\Models\StaffCategory;
use App\Models\User;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::updateOrCreate(
            [
                'id' => 1
            ],
            [
                'id' => 1,
                'name' => User::READ_USER,
                'display' => 'Regra possibilita usuários ter acesso aos usuários do sistema.',
                'sub_module_id' => 1
            ]
        );

        Role::updateOrCreate(
            [
                'id' => 2
            ],
            [
                'id' => 2,
                'name' => User::STORE_USER,
                'display' => 'Regra possibilita usuários criar novos usuários',
                'sub_module_id' => 1
            ]
        );

        Role::updateOrCreate(
            [
                'id' => 3
            ],
            [
                'id' => 3,
                'name' => User::UPDATE_USER,
                'display' => 'Regra possibilita usuários atualizar usuários existentes',
                'sub_module_id' => 1
            ]
        );

        Role::updateOrCreate(
            [
                'id' => 4
            ],
            [
                'id' => 4,
                'name' => User::DELETE_USER,
                'display' => 'Regra possibilita usuários removerem usuários existentes.',
                'sub_module_id' => 1
            ]
        );

        Role::updateOrCreate(
            [
                'id' => 5
            ],
            [
                'id' => 5,
                'name' => Expense::READ_EXPENSE,
                'display' => 'Regra possibilita usuários ter acesso as despesas do sistema.',
                'sub_module_id' => 3
            ]
        );

        Role::updateOrCreate(
            [
                'id' => 6
            ],
            [
                'id' => 6,
                'name' => Expense::STORE_EXPENSE,
                'display' => 'Regra possibilita usuários criar novas despesas',
                'sub_module_id' => 3
            ]
        );

        Role::updateOrCreate(
            [
                'id' => 7
            ],
            [
                'id' => 7,
                'name' => Expense::UPDATE_EXPENSE,
                'display' => 'Regra possibilita usuários atualizar despesas existentes',
                'sub_module_id' => 3
            ]
        );

        Role::updateOrCreate(
            [
                'id' => 8
            ],
            [
                'id' => 8,
                'name' => Expense::DELETE_EXPENSE,
                'display' => 'Regra possibilita usuários removerem despesas existentes.',
                'sub_module_id' => 3
            ]
        );

        Role::updateOrCreate(
            [
                'id' => 9
            ],
            [
                'id' => 9,
                'name' => Customer::READ_CUSTOMER,
                'display' => 'Regra possibilita usuários ter acesso aos clientes do sistema.',
                'sub_module_id' => 2
            ]
        );

        Role::updateOrCreate(
            [
                'id' => 10
            ],
            [
                'id' => 10,
                'name' => Customer::STORE_CUSTOMER,
                'display' => 'Regra possibilita usuários criar novos clientes',
                'sub_module_id' => 2
            ]
        );

        Role::updateOrCreate(
            [
                'id' => 11
            ],
            [
                'id' => 11,
                'name' => Customer::UPDATE_CUSTOMER,
                'display' => 'Regra possibilita usuários atualizar novos clientes',
                'sub_module_id' => 2
            ]
        );

        Role::updateOrCreate(
            [
                'id' => 12
            ],
            [
                'id' => 12,
                'name' => Customer::DELETE_CUSTOMER,
                'display' => 'Regra possibilita usuários criar novos clientes',
                'sub_module_id' => 2
            ]
        );

        Role::updateOrCreate(
            [
                'id' => 13
            ],
            [
                'id' => 13,
                'name' => Procedure::READ_PROCEDURE,
                'display' => 'Regra possibilita usuários ter acesso aos procedimentos do sistema.',
                'sub_module_id' => 4
            ]
        );

        Role::updateOrCreate(
            [
                'id' => 14
            ],
            [
                'id' => 14,
                'name' => Procedure::STORE_PROCEDURE,
                'display' => 'Regra possibilita usuários criar novos procedimentos',
                'sub_module_id' => 4
            ]
        );

        Role::updateOrCreate(
            [
                'id' => 15
            ],
            [
                'id' => 15,
                'name' => Procedure::UPDATE_PROCEDURE,
                'display' => 'Regra possibilita usuários atualizar novos procedimentos',
                'sub_module_id' => 4
            ]
        );

        Role::updateOrCreate(
            [
                'id' => 16
            ],
            [
                'id' => 16,
                'name' => Procedure::DELETE_PROCEDURE,
                'display' => 'Regra possibilita usuários deletar os clientes',
                'sub_module_id' => 4
            ]
        );

        Role::updateOrCreate(
            [
                'id' => 17
            ],
            [
                'id' => 17,
                'name' => Transaction::READ_TRANSACTION,
                'display' => 'Regra possibilita usuários ter acesso as transações dos clientes.',
                'sub_module_id' => 5
            ]
        );

        Role::updateOrCreate(
            [
                'id' => 18
            ],
            [
                'id' => 18,
                'name' => Transaction::STORE_TRANSACTION,
                'display' => 'Regra possibilita usuários adicionar novas transações para os clientes',
                'sub_module_id' => 5
            ]
        );

        Role::updateOrCreate(
            [
                'id' => 19
            ],
            [
                'id' => 19,
                'name' => Transaction::UPDATE_TRANSACTION,
                'display' => 'Regra possibilita usuários atualizar os tratamentos dos clientes',
                'sub_module_id' => 5
            ]
        );

        Role::updateOrCreate(
            [
                'id' => 20
            ],
            [
                'id' => 20,
                'name' => Transaction::DELETE_TRANSACTION,
                'display' => 'Regra possibilita usuários deletar as transações dos clientes',
                'sub_module_id' => 5
            ]
        );

        Role::updateOrCreate(
            [
                'id' => 21
            ],
            [
                'id' => 21,
                'name' => Staff::READ_STAFF,
                'display' => 'Regra possibilita usuários ter acesso as informações dos funcionários',
                'sub_module_id' => 6
            ]
        );

        Role::updateOrCreate(
            [
                'id' => 22
            ],
            [
                'id' => 22,
                'name' => Staff::STORE_STAFF,
                'display' => 'Regra possibilita usuários adcionar novos funcionários',
                'sub_module_id' => 6
            ]
        );

        Role::updateOrCreate(
            [
                'id' => 23
            ],
            [
                'id' => 23,
                'name' => Staff::UPDATE_STAFF,
                'display' => 'Regra possibilita usuários atualizar as informações dos funcionários',
                'sub_module_id' => 6
            ]
        );

        Role::updateOrCreate(
            [
                'id' => 24
            ],
            [
                'id' => 24,
                'name' => Staff::DELETE_STAFF,
                'display' => 'Regra possibilita usuários deletar os funcionários',
                'sub_module_id' => 6
            ]
        );

        Role::updateOrCreate(
            [
                'id' => 25
            ],
            [
                'id' => 25,
                'name' => StaffCategory::READ_STAFF_CATEGORY,
                'display' => 'Regra possibilita usuários ter acesso as informações das categorias de funcionários',
                'sub_module_id' => 7
            ]
        );

        Role::updateOrCreate(
            [
                'id' => 26
            ],
            [
                'id' => 26,
                'name' => StaffCategory::STORE_STAFF_CATEGORY,
                'display' => 'Regra possibilita usuários adcionar novas categorias de funcionários',
                'sub_module_id' => 7
            ]
        );

        Role::updateOrCreate(
            [
                'id' => 27
            ],
            [
                'id' => 27,
                'name' => StaffCategory::UPDATE_STAFF_CATEGORY,
                'display' => 'Regra possibilita usuários atualizar as informações das categorias de funcionários',
                'sub_module_id' => 7
            ]
        );

        Role::updateOrCreate(
            [
                'id' => 28
            ],
            [
                'id' => 28,
                'name' => StaffCategory::DELETE_STAFF_CATEGORY,
                'display' => 'Regra possibilita usuários deletar as categorias de funcionários',
                'sub_module_id' => 7
            ]
        );

        /***init here*/

        Role::updateOrCreate(
            [
                'id' => 29
            ],
            [
                'id' => 29,
                'name' => ExpenseCategory::READ_EXPENSE_CATEGORY,
                'display' => 'Regra possibilita usuários ter acesso as informações das categorias de Despesas',
                'sub_module_id' => 7
            ]
        );

        Role::updateOrCreate(
            [
                'id' => 30
            ],
            [
                'id' => 30,
                'name' => ExpenseCategory::STORE_EXPENSE_CATEGORY,
                'display' => 'Regra possibilita usuários adcionar novas categorias de Despesas',
                'sub_module_id' => 7
            ]
        );

        Role::updateOrCreate(
            [
                'id' => 31
            ],
            [
                'id' => 31,
                'name' => ExpenseCategory::UPDATE_EXPENSE_CATEGORY,
                'display' => 'Regra possibilita usuários atualizar as informações das categorias de Despesas',
                'sub_module_id' => 7
            ]
        );

        Role::updateOrCreate(
            [
                'id' => 32
            ],
            [
                'id' => 32,
                'name' => ExpenseCategory::DELETE_EXPENSE_CATEGORY,
                'display' => 'Regra possibilita usuários deletar as categorias de Despesas',
                'sub_module_id' => 7
            ]
        );


    }
}
