<?php

use App\Models\SubModule;
use Illuminate\Database\Seeder;

class SubModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubModule::updateOrCreate(
            [
                'id' => 1
            ],
            [
                'id' => 1,
                'name' => 'Usuários',
                'url' => 'UserController@read_user',
                'icon' => 'fa fa-user',
                'module_id' => 4,
                'sub_module_category_id' => 1
            ]
        );

        SubModule::updateOrCreate(
            [
                'id' => 2
            ],
            [
                'id' => 2,
                'name' => 'Clientes',
                'url' => 'CustomerController@read_customer',
                'icon' => 'fa fa-user',
                'module_id' => 1,
                'sub_module_category_id' => 1
            ]
        );

        SubModule::updateOrCreate(
            [
                'id' => 3
            ],
            [
                'id' => 3,
                'name' => 'Despesas',
                'url' => 'ExpenseController@index',
                'icon' => 'fa fa-money',
                'module_id' => 2,
                'sub_module_category_id' => 1
            ]
        );

        SubModule::updateOrCreate(
            [
                'id' => 4
            ],
            [
                'id' => 4,
                'name' => 'Procedimentos',
                'url' => 'ProcedureController@read_procedure',
                'icon' => 'fa fa-list',
                'module_id' => 1,
                'sub_module_category_id' => 1
            ]
        );

        SubModule::updateOrCreate(
            [
                'id' => 5
            ],
            [
                'id' => 5,
                'name' => 'Prontuários',
                'url' => 'TransactionController@read_transaction',
                'icon' => 'fa fa-tasks',
                'module_id' => 1,
                'sub_module_category_id' => 1
            ]
        );

        SubModule::updateOrCreate(
            [
                'id' => 6
            ],
            [
                'id' => 6,
                'name' => 'Funcionários',
                'url' => 'StaffController@read_staff',
                'icon' => 'fa fa-user-md',
                'module_id' => 4,
                'sub_module_category_id' => 1
            ]
        );

        SubModule::updateOrCreate(
            [
                'id' => 7
            ],
            [
                'id' => 7,
                'name' => 'Categoria de Funcionários',
                'url' => 'StaffCategoryController@read_staff_category',
                'icon' => 'fa fa-sticky-note',
                'module_id' => 4,
                'sub_module_category_id' => 1
            ]
        );

        SubModule::updateOrCreate(
            [
                'id' => 8
            ],
            [
                'id' => 8,
                'name' => 'Centro de Custos',
                'url' => 'ExpenseCategoryController@read_expense_category',
                'icon' => 'fa fa-sticky-note',
                'module_id' => 4,
                'sub_module_category_id' => 1
            ]
        );

        SubModule::updateOrCreate(
            [
                'id' => 9
            ],
            [
                'id' => 9,
                'name' => 'Resultado Operacional',
                'url' => 'ReportController@resume_expense_transactions',
                'icon' => 'fa fa-pie-chart',
                'module_id' => 5,
                'sub_module_category_id' => 1
            ]
        );

        SubModule::updateOrCreate(
            [
                'id' => 10
            ],
            [
                'id' => 10,
                'name' => 'Resultado de Receitas',
                'url' => 'TransactionController@transactions_report',
                'icon' => 'fa fa-area-chart',
                'module_id' => 5,
                'sub_module_category_id' => 1
            ]
        );

        SubModule::updateOrCreate(
            [
                'id' => 11
            ],
            [
                'id' => 11,
                'name' => 'Resultado de Despesas',
                'url' => 'ExpenseController@expenses_report',
                'icon' => 'fa fa-line-chart',
                'module_id' => 5,
                'sub_module_category_id' => 1
            ]
        );

    }
}
