<?php

namespace App\Salary\Calculator;

use Carbon\Carbon;

/**
 * Class used to calculate current month base payment date
 * 
 * @author Lucas Padilha
 */
class Base
{
    /**
     * @var Carbon
     */
    private $date;

    /**
     * Class constructor
     * 
     * @return void
     */
    public function __construct(Carbon $date)
    {
        $this->date = $date->clone();
    }

    /**
     * Get the payment date for the current month
     * 
     * @param string $format Format to return the date
     * 
     * @return string
     */
    public function getPaymentDate(string $format = 'd/m/Y'): string
    {
        $this->date->modify('last day of this month');

        if (!$this->date->isWeekday()) {
            $this->date->modify('last friday of this month');
        }

        return $this->date->format($format);
    }
}
