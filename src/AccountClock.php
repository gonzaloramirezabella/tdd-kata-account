<?php

declare(strict_types=1);


namespace gonza683\PhpBootstrap;


final class AccountClock implements Clock
{
    public function now()
    {
        return date("d.m.Y");
    }
}
