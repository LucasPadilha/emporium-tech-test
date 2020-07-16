<?php 

namespace App\Salary\Outputter;

use Exception;

/**
 * Class used to output the payment dates in CSV format
 * 
 * @author Lucas Padilha
 */
class Csv
{
   /**
     * @var array
     */
    private $headers = [
        'Month',
        'Base Payment Date',
        'Bonus Payment Date'
    ];

    /**
     * @var string
     */
    private $file;

    /**
     * @var array
     */
    private $data;

    /**
     * Csv class constructor
     * 
     * @param string $suffix The suffix which will be used on the file name
     * @param array $data The data to populate the file
     * 
     * @return void
     */
    public function __construct(string $suffix, array $data)
    {
        $this->file = storage_path("app/csv/salary-calculator-{$suffix}.csv");
        $this->data = $data;
    }

    /**
     * Method to handle the outputting task
     * 
     * @throws Exception if the file couldn't be opened
     * 
     * @return string The generated file path
     */
    public function handle(): string
    {
        $handler = fopen($this->file, 'w');

        if ($handler === false) {
            throw new Exception('Cannot open the file for outputting.');
        }

        fputcsv($handler, $this->headers);

        foreach ($this->data as $fields) {
            fputcsv($handler, $fields);
        }

        fclose($handler);

        return $this->file;
    }
}
