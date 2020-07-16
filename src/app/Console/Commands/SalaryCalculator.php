<?php

namespace App\Console\Commands;

use App\Salary\Calculator;
use Exception;
use Illuminate\Console\Command;

/**
 * A command that returns a file with payment dates
 * 
 * Calculates the payment dates for base salary and bonus for the next 12 months
 */
class SalaryCalculator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'salary:calculate 
                            {--N|next : Use the next month as if it\'s the first month}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculate salary and salary bonus payment dates.';

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
     * @return int
     */
    public function handle()
    {
        $next = $this->option('next');

        $starting_date = 'first day of this month';
        if ($next === true) {
            $starting_date = 'first day of next month';
        }

        try {
            $calculator = new Calculator($starting_date);

            $file_path = $calculator->calculatePaymentDays()->output('csv');
    
            $this->info('Your file has been successfully generated at: '. $file_path);

            return 0;
        } catch (Exception $e) {
            $this->warn($e->getMessage());

            return 1;
        }
    }
}
