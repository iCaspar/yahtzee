<?php

declare(strict_types=1);

namespace Yahtzee\Game\Dice;

use PHPUnit\Framework\TestCase;
use Yahtzee\Exceptions\OutOfRange;

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
    public function should_start_with_at_least_1_die(): void
    {
        $this->expectOutOfRange();
        $dice = new Dice(0);
    }

    /**
     * @test
     */
    public function should_start_with_at_most_5_dice(): void
    {
        $this->expectOutOfRange();
        $dice = new Dice(6);
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
    public function cannot_add_dice_to_more_than_5(): void
    {
        $dice = new Dice(2);
        $this->expectOutOfRange();
        $dice->add(4);
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
    public function cannot_remove_dice_to_less_than_1(): void
    {
        $dice = new Dice(5);
        $this->expectOutOfRange();
        $dice->remove(5);
    }

    /**
     * @test
     */
    public function roll_should_give_one_value_per_die(): void
    {
        $dice = new Dice(4);
        $this->assertCount(4, $dice->roll());
    }

    private function expectOutOfRange(): void
    {
        $this->expectException(OutOfRange::class);
        $this->expectExceptionMessage('Dice must have count between 1 and 5');
    }
}
