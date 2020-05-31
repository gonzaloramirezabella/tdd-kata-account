<?php

declare(strict_types=1);


namespace gonza683\PhpBootstrap;

use gonza683\PhpBootstrap\exceptions\NotEnoughBalanceException;

final class Account
{
    private $balance;
    private $statements;
    private $clock;

    public function __construct(int $balance, Clock $clock)
    {
        $this->balance = $balance;
        $this->statements = [];
        $this->clock = $clock;
    }

    public function deposit(int $deposit)
    {
        $this->balance += $deposit;
        $this->statements[] = new Statement(
            $this->balance,
            $this->clock->now(),
            "+" . $deposit
        );
    }

    public function withdraw($amount)
    {
        $this->validateWithdraw($amount);
        $this->balance -= $amount;
        $amount = "-" . $amount;
        $this->statements[] = new Statement(
            $this->balance,
            $this->clock->now(),
            $amount
        );
    }

    private function validateWithdraw($amount)
    {
        if ($amount > $this->balance) {
            throw new NotEnoughBalanceException();
        }
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function printStatement()
    {
        $response = "Date Amount Balance\n";
        foreach ($this->statements as $statement) {
            $response .= $statement->__toString() . "\n";
        }
        return $response;
    }
}
