<?php

declare(strict_types=1);

namespace Yahtzee\Game\Dice;

use Yahtzee\Exceptions\OutOfRange;

final class Dice
{
    public function __construct(private int $dieCount)
    {
        $this->validateCount();
    }

    public function count(): int
    {
        return $this->dieCount;
    }

    public function add(int $count): void
    {
        $this->dieCount += $count;
        $this->validateCount();
    }

    public function remove(int $count): void
    {
        $this->dieCount -= $count;
        $this->validateCount();
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

    private function validateCount(): void
    {
        if ($this->dieCount < 1 || $this->dieCount > 5) {
            throw new OutOfRange('Dice must have count between 1 and 5');
        }
    }
}
