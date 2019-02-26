<?php

use CrossBones\AboutTime\AT;
use PHPUnit\Framework\TestCase;

/**
 * Created by PhpStorm.
 * User: Vishal-Ribdiya
 * Date: 2/27/2019
 * Time: 1:48 AM
 */

class AboutTimeTest extends TestCase
{
    /**
     * @test
     */
    public function test_return_true()
    {
        // arrange
        $result = AT::returnTrue();
        // assert
        $this->assertTrue($result);
    }

    public function test_return_unique_array_of_days()
    {
        // arrange
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $startDate = date('Y-m-d');
        $endDate = date('Y-m-d', strtotime($startDate.'+10 days'));
        // act
        $result = AT::days($startDate,$endDate);
        // assert
        $this->assertEmpty(array_diff($days, $result));
    }

}