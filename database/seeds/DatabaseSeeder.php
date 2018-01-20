<?php

use App\Models\Expensive\ExpenseCategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CustomersSeeder::class);

        $this->call(UsersSeeder::class);

        $this->call(ModulesSeeder::class);

        $this->call(SubModuleCategoriesSeeder::class);

        $this->call(SubModulesSeeder::class);

        $this->call(RolesSeeder::class);

        $this->call(ExpenseCategorySeeder::class);

    }
}
