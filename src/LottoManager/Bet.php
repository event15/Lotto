<?php

namespace LottoManager;

final class Bet
{
    public function onTheLottery(\DateTime $date, $numbers)
    {
        $numbers = is_string($numbers) ? Numbers::createFromString($numbers) : Numbers::createFromArray($numbers);

        return new Result($date, $numbers);
    }
}