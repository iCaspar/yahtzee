<?php

declare(strict_types=1);

namespace Yahtzee\Game\Dice;

final class Dice
{
    public function __construct(private int $dieCount)
    {
    }

    public function count(): int
    {
        return $this->dieCount;
    }

    public function add(int $count): void
    {
        $this->dieCount += $count;
    }

    public function remove(int $count): void
    {
        $this->dieCount -= $count;
    }

    public function roll(): array
    {
        $count = $this->dieCount;
        $values = [];
        while($count) {
            $values[] = 1;
            $count--;
        }
        return $values;
    }
}
