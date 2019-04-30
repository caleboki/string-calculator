<?php

class StringCalculator
{
    const MAX_NUMBER_ALLOWED = 1000;
    public function add($numbers)
    {
        $numbers = $this->parseNumbers($numbers);
        $solution = 0;

        foreach ($numbers as $number) 
        {

            $this->guardAgainstInvalidNumber($number);
            if ($number >= self::MAX_NUMBER_ALLOWED) continue;
            
            $solution += $number;
        }
        return $solution;
    }

    public function guardAgainstInvalidNumber($number)
    {
        if ($number < 0) throw new InvalidArgumentException('Negatives not allowed:' . $number);
    }

    public function parseNumbers($numbers)
    {

        preg_match_all('/[\+\-]?[0-9]+/', $numbers, $matches);
        $numbers = $matches[0];
        print_r($numbers);
        return $numbers;
        
    }
}
