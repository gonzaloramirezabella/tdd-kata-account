<?php

declare(strict_types=1);

namespace gonza683\PhpBootstrap\mocks;

use gonza683\PhpBootstrap\Clock;

final class ClockMock implements Clock
{
    public $date;

    public function __construct($date)
    {
        $this->date = $date;
    }

    public function now()
    {
        return $this->date;
    }
}
