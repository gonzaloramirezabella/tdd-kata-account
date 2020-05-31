<?php

declare(strict_types = 1);

namespace gonza683\PhpBootstrap;

final class Codelyber
{
    /** string */
    private const GREETING = "CodelyTV";

    /** @var string */
    private $name;

    public function __construct(string $aName)
    {
        $this->name = $aName;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function greet(): string
    {
        return self::GREETING;
    }
}
