<?php

declare(strict_types=1);

namespace Yahtzee\Game\Dice;

use Countable;
use Yahtzee\Exceptions\DieNotExists;

/**
 * @immutable
 */
final class Roll implements Countable
{
    private readonly array $values;

    public function __construct(int $dieCount)
    {
        $values = [];
        while ($dieCount) {
            $values[] = random_int(1, 6);
            $dieCount--;
        }

        $this->values = $values;
    }

    public function count(): int
    {
        return count($this->values);
    }

    public function dieValue(int $die): int
    {
        if (! isset($this->values[$die -1])) {
            throw new DieNotExists('Die ' . $die . ' does not exist');
        }
        return $this->values[$die - 1];
    }
}
