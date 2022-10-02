<?php

declare(strict_types=1);

namespace Yahtzee\Game\Dice;

use PHPUnit\Framework\TestCase;
use Yahtzee\Exceptions\MissingDie;

final class RollTest extends TestCase
{
    /**
     * @test
     */
    public function is_countable(): void
    {
        $roll = new Roll(1);
        $this->assertCount(1, $roll);
    }

    /**
     * @test
     */
    public function can_get_die_value(): void
    {
        $roll = new Roll(1);
        $this->assertIsInt($roll->dieValue(1));
    }

    /**
     * @test
     */
    public function cannot_get_die_value_that_does_not_exist(): void
    {
        $roll = new Roll(1);
        $this->expectException(MissingDie::class);
        $this->expectExceptionMessage('Die 2 does not exist');
        $roll->dieValue(2);
    }

    /**
     * @test
     */
    public function should_roll_every_number_between_1_and_6(): void
    {
        $values = [];
        for ($rolls = 0; $rolls < 60; $rolls++) {
            $roll = new Roll(1);
            $values[$roll->dieValue(1)] = true;
        }
        $this->assertArrayNotHasKey(0, $values);
        $this->assertArrayNotHasKey(7, $values);
        for ($pips = 1; $pips <= 6; $pips++) {
            $this->assertArrayHasKey($pips, $values);
        }
    }
}
