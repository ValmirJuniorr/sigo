<?php

namespace App\Console\Commands;

use App\Models\Expensive\Expense;
use Illuminate\Console\Command;

class LauchExpenses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'routine:launch_expenses';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando irá atualizar todos os registros de gastos considerados rotineira';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $expense = new Expense();
        return $expense->launch_expenses();
    }
}
