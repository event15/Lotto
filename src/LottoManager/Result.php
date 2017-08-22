<?php

namespace LottoManager;

use Ramsey\Uuid\Uuid;

final class Result
{
    private $uuid;
    private $date;
    private $numbers;

    public function __construct(\DateTime $date, Numbers $numbers)
    {
        $this->uuid = Uuid::uuid4();
        $this->date    = $date;
        $this->numbers = $numbers;
    }

    public function __toString() : string
    {
        $result = [
            'uuid' => $this->uuid->toString(),
            'date' => $this->date->format('Y-m-d H:i:s'),
            'numbers' => (string) $this->numbers
        ];

        return (string) json_encode($result, true);
    }

    public function numbers()
    {
        return (array) $this->numbers->toArray();
    }
}