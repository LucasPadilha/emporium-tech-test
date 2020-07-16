<?php

namespace App\Salary;

use App\Salary\Calculator\Base;
use App\Salary\Calculator\Bonus;
use App\Salary\Outputter\Csv;
use Carbon\Carbon;
use Exception;

/**
 * Calculator class is used to calculate and output 12 months of payment dates
 * 
 * @author Lucas Padilha
 */
class Calculator
{
    /**
     * An array populated with all payment dates, used for outputting
     * 
     * @var array
     */
    private $output_data = [];

    /**
     * The starting date which will be used to calculate the next 12 months
     * 
     * @var Carbon
     */
    private $starting_date;

    /**
     * Class contructor, used for setting the starting date
     * 
     * @param string $starting_date String compatible with strtotime to set the starting date
     * 
     * @throws Exception if date format is not supported
     * 
     * @return void
     */
    public function __construct($starting_date = 'now')
    {
        if (strtotime($starting_date) === false) {
            throw new Exception('Starting date format not supported');
        }

        $this->starting_date = Carbon::parse($starting_date);
    }

    /**
     * Method used to calculate payment dates
     * 
     * @return Calculator
     */
    public function calculatePaymentDays(): Calculator
    {
        $data = [];

        for ($i = 0; $i < 12; $i++) {
            $payment_day = new Base($this->starting_date);
            $bonus_payment_day = new Bonus($this->starting_date);

            $data[] = [
                'month' => $this->starting_date->format('F'),
                'base_payment_date' => $payment_day->getPaymentDate(),
                'bonus_payment_date' => $bonus_payment_day->getPaymentDate()
            ];

            $this->starting_date->modify('next month');
        }

        $this->output_data = $data;

        return $this;
    }

    /**
     * Output the payment data to a file
     * 
     * @param string $type The file type used to output the data
     * 
     * @throws Exception if type is not supported
     * 
     * @return string
     */
    public function output(string $type): string
    {
        $from_date = $this->starting_date->clone();
        $from_date->modify('-12 month');

        $to_date = $this->starting_date->clone();
        $to_date->modify('-1 month');

        $suffix = sprintf('from-%s-to-%s', $from_date->format('m-Y'), $to_date->format('m-Y'));
        
        $type = mb_strtolower($type);
        switch ($type) {
            case 'csv':
                $outputter = new Csv($suffix, $this->output_data);
                break;

            default:
                throw new Exception('Type not supported.');
                break;
        };

        return $outputter->handle();
    }
}
