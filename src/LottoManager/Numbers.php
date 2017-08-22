<?php

namespace LottoManager;

final class Numbers
{
    private  $collection = [];

    private function __construct(){}

    public static function createFromArray(array $given) : Numbers
    {
        self::validate($given);

        $numbers = new Numbers();
        foreach ($given as $value) {
            $numbers->collection[] = new Number($value);
        }

        return $numbers;
    }

    public static function createFromString(string $given) : Numbers
    {
        $numbers = new Numbers();
        $given   = explode(',', $given);

        self::validate($given);

        foreach ($given as $value) {
            $numbers->collection[] = new Number((int)$value);
        }

        return $numbers;
    }

    /**
     * @param array $given
     * @return array
     */
    private static function validate(array $given): bool
    {
        $given = array_unique($given);

        if (count($given) !== 6) {
            throw new \DomainException('Lotto musi mieć dokładnie 6 _unikalnych_ liczb.');
        }

        foreach ($given as $value) {
            if ((int)$value < 1 || (int)$value > 49) {
                throw new \DomainException('Liczby muszą być z zakresu <1, 49>.');
            }
        }

        return true;
    }

    public function __toString() : string
    {
        return implode(',', $this->collection);
    }

    public function toArray()
    {
        foreach ($this->collection as $item) {
            $result[] = (string) $item;
        }

        return  $result;
    }
}