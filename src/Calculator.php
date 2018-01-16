<?php

declare(strict_types=1);

class Calculator
{
    /**
     * @param $augend
     * @param $addend
     * @return mixed
     */
    public function add($augend, $addend)
    {
        return $augend + $addend;
    }

    /**
     * @param $minuend
     * @param $subtrahend
     * @return mixed
     */
    public function subtract($minuend, $subtrahend)
    {
        return $this->add($minuend, 0 - $subtrahend);
    }

}
