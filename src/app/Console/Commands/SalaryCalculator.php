<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SalaryCalculator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'salary:calculate 
                            {name : The staff\'s name} 
                            {--N|next : Use the next month as if it\'s the first month}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculate salary and salary bonus payment dates of a given staff member.';

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
        return 0;
    }
}
