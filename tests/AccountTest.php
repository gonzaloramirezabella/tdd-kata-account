<?php

declare(strict_types=1);

namespace gonza683\PhpBootstrapTest;

use gonza683\PhpBootstrap\Account;
use gonza683\PhpBootstrap\AccountClock;
use gonza683\PhpBootstrap\exceptions\NotEnoughBalanceException;
use gonza683\PhpBootstrap\mocks\ClockMock;
use PHPUnit\Framework\TestCase;

final class AccountTest extends TestCase
{

    /** @test */
    public function shouldAddAmountWhenDeposit()
    {
        $deposit = random_int(0, 1000);
        $balance = random_int(0, 1000);
        $account = new Account($balance, new AccountClock());
        $account->deposit($deposit);

        $this->assertEquals($deposit + $balance, $account->getBalance());
    }

    /** @test */
    public function shouldRestAmountWhenWhithdraw()
    {
        $amount = random_int(0, 1000);
        $balance = 2000;
        $account = new Account($balance, new AccountClock());
        $account->withdraw($amount);

        $this->assertEquals($balance - $amount, $account->getBalance());
    }

    /** @test */
    public function shouldRaiseErrorWhenAmountIsMoreThanBalance()
    {
        $this->expectException(NotEnoughBalanceException::class);

        $amount = random_int(1000, 2000);
        $balance = 100;
        $account = new Account($balance, new AccountClock());
        $account->withdraw($amount);
    }
    /** @test */
    public function shouldPrintStatement()
    {
        $clock = new ClockMock("24.12.2015");
        $account = new Account(0, $clock);
        $account->deposit(500);
        $clock->date = "23.8.2016";
        $account->withdraw(100);

        $this->assertSame("Date Amount Balance\n24.12.2015 +500 500\n23.8.2016 -100 400\n", $account->printStatement());
    }
}
