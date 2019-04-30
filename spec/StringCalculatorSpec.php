<?php

namespace spec;

use StringCalculator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use InvalidArgumentException;

class StringCalculatorSpec extends ObjectBehavior
{

    // NUMBER 1
    // Empty string returns 0
    function it_translates_an_empty_string_into_zero()
    {
        $this->add('')->shouldEqual(0);
    }

    // Sum of 1,2,5 should be 8
    function it_finds_the__sum_of_1_2_5_numbers()
    {
        $this->add('1,2,5')->shouldEqual(8);
    }

    // NUMBER 2
    // Sum of '1,\n2,3' should be 6
    function it_allows_for_new_line_delimiters_and_finds_the_sum_of_1_2_3()
    {
        $this->add('1,\n2,3')->shouldEqual(6);
    }

    // Sum of '1,\n2,4' should be 7
    function it_allows_for_new_line_delimiters_and_finds_the_sum_of_1_2_4()
    {
        $this->add('1,\n2,4')->shouldEqual(7);
    }

    //Number 3
    //Sum of '//;\n1;3;4' should be 8
    function it_allows_for_custom_delimeters_1_3_4()
    {
        $this->add('//;\n1;3;4')->shouldEqual(8);
    }

    //Sum of '//;\n1;2;3' should be 6
    function it_allows_for_custom_delimeters_1_2_3()
    {
        $this->add('//;\n1;2;3')->shouldEqual(6);
    }

    //Sum of '//@\n2@3@8' should be 13
    function it_allows_for_custom_delimeters_2_3_8()
    {
        $this->add('//@\n2@3@8')->shouldEqual(13);
    }

    //Number 4
    function it_disallows_negative_numbers()
    {
        $this->shouldThrow(new InvalidArgumentException('Negatives not allowed:-2'))->duringAdd('3,-2');
    }

    function it_allows_for_new_line_delimiters()
    {
        $this->add('2, 2\n2')->shouldEqual(6);
    }


    // Bonus 1
    function it_ignores_any_number_that_is_one_thousand_or_greater()
    {
        $this->add('2, 1001')->shouldEqual(2);
    }

    // Bonus 2
    function it_allows_delimeters_of_arbitrary_length_1_2_3()
    {    
        $this->add( '//***\n1***2***3')->shouldEqual(6);
    }

    // Bonus 3
    function it_allows_multiple_delimeters_1_2_3()
    {
        $this->add( '//$,@\n1$2@3')->shouldEqual(6);
    }

    //Bonus 4
    function it_allows_multiple_delimeters_of_arbitrary_length_1_2_3_1_2_3()
    {
        $this->add( '//$,@\n1$2@3//***\n1***2***3')->shouldEqual(12);
    }


    
}
