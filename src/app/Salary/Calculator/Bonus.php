<?php

namespace App\Salary\Calculator;

use Carbon\Carbon;

/**
 * Class used to calculate bonus payment date
 * 
 * @author Lucas Padilha
 */
class Bonus
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
     * Get the bonus payment date for the current month
     * 
     * @param string $format Format to return the date
     * 
     * @return string
     */
    public function getPaymentDate(string $format = 'd/m/Y'): string
    {
        $this->date->modify('first day of this month');
        $this->date->addDays(9);

        if (!$this->date->isWeekday()) {
            $this->date->modify('next tuesday');
        }

        return $this->date->format($format);
    }
}
