<?php
namespace LottoManager;

final class Number
{
    private $value;

    public function __construct(int $number)
    {
        $this->value = $number;
    }

    public function __toString() : string
    {
        return (string) $this->value;
    }
}