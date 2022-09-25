<?php

declare(strict_types=1);

namespace Yahtzee\Game\Dice;

use PHPUnit\Framework\TestCase;

final class DiceTest extends TestCase
{
    /**
     * @test
     */
    public function has_count(): void
    {
        $dice = new Dice(5);
        $this->assertSame(5, $dice->count());
    }

    /**
     * @test
     */
    public function can_add_dice(): void
    {
        $dice = new Dice(2);
        $dice->add(3);
        $this->assertSame(5, $dice->count());
    }

    /**
     * @test
     */
    public function can_remove_dice(): void
    {
        $dice = new Dice(5);
        $dice->remove(3);
        $this->assertSame(2, $dice->count());
    }

    /**
     * @test
     */
    public function roll_should_give_one_value_per_die(): void
    {
        $dice = new Dice(4);
        $this->assertCount(4, $dice->roll());
    }
}
