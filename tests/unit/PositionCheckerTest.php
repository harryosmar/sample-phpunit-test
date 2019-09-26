<?php
declare(strict_types=1);

namespace Sample\Tests\unit;


class PositionCheckerTest extends Base
{
    /**
     * @test
     * @dataProvider getDataProvider
     * @param string $input
     * @param int $position
     * @param string $expectedValue
     */
    public function shouldBeWorkingAsExpected(
        string $input,
        int $position,
        string $expectedValue
    ) {
        $positionChecker = new \Sample\PositionChecker();
        $this->assertEquals($expectedValue, $positionChecker->check($input, $position));
    }

    public function getDataProvider()
    {
        return [
            'given a valid input and position when check 21th position then return the correct value' => [
                'input'    => '012345678901234567890123456789',
                'position' => 21,
                'value'    => '0'
            ],
            'given a valid input and position when check 1st position then return the correct value'  => [
                'input'    => '0123456789',
                'position' => 1,
                'value'    => '0'
            ],
            'given a valid input and position when check last position then return the correct value' => [
                'input'    => '01234567895',
                'position' => 11,
                'value'    => '5'
            ],
        ];
    }
}