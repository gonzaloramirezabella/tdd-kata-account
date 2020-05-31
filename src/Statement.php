<?php

declare(strict_types=1);


namespace gonza683\PhpBootstrap;

final class Statement
{
    private $balance;
    private $date;
    private $amount;

    public function __construct(int $balance, $date, string $amount)
    {
        $this->balance = $balance;
        $this->date = $date;
        $this->amount = $amount;
    }

    public function __toString()
    {
        return sprintf("%s %s %s", $this->date, $this->amount, $this->balance);
    }
}
