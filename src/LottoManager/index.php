<?php
require_once __DIR__ . '/../../vendor/autoload.php';

$bet = new LottoManager\Bet();

$handle = fopen('../../bets/bets.txt', "r");
$numbers = [];
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $lotto = explode(' ', $line);
        $numbers[] = $bet->onTheLottery(new DateTime($lotto[1]),$lotto[2]);
    }

    fclose($handle);
}
$available = array_fill(1, 49, 0);
/** @var \LottoManager\Result $number */
foreach ($numbers as $number) {
    foreach ($number->numbers() as $value) {
        $available[$value] += 1;
    }
}

print_r($available);
arsort($available);
print_r($available);