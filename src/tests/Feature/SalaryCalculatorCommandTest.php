<?php

namespace Tests\Feature;

use Tests\TestCase;

/**
 * Test that runs the command without options and expect exit code 0 (success)
 * 
 * @author Lucas Padilha
 */
class SalaryCalculatorCommandTest extends TestCase
{
    /**
     * Test if command is returning exit code 0 (success)
     *
     * @return void
     */
    public function testExample()
    {
        $this->artisan('salary:calculate')
            ->assertExitCode(0);
    }
}
