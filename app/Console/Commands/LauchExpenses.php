<?php

namespace App\Console\Commands;

use App\Models\Expensive\Expense;
use Carbon\Carbon;
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
    protected $description = 'Comando atualiza as despesas cadastradas como rotinas';

    /**
     * Create a new command instance.
     *
     * @return void
     */

    private $expense;


    public function __construct()
    {
        parent::__construct();
        $this->expense = new Expense();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->expense->launch_expenses();
        print('desp_sinc - '.Carbon::parse()."\n");
    }
}
