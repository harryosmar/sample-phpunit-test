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
     * @param string|null $expectedValue
     */
    public function shouldBeWorkingAsExpected(
        string $input,
        int $position,
        $expectedValue
    ) {
        $positionChecker = new \Sample\PositionChecker();
        $this->assertEquals($expectedValue, $positionChecker->check($input, $position));
    }

    public function getDataProvider()
    {
        return [
            'given a valid input and position when check 21th position then return the correct value'                                  => [
                'input'    => '012345678901234567890123456789',
                'position' => 21,
                'value'    => '0'
            ],
            'given a valid input and position when check 1st position then return the correct value'                                   => [
                'input'    => '0123456789',
                'position' => 1,
                'value'    => '0'
            ],
            'given a valid input and position when check last position then return the correct value'                                  => [
                'input'    => '01234567895',
                'position' => -1,
                'value'    => '5'
            ],
            'given a valid input and position when check 1st position and input only consist of 1 char then return the correct value'  => [
                'input'    => '9',
                'position' => 1,
                'value'    => '9'
            ],
            'given a valid input and position when check last position and input only consist of 1 char then return the correct value' => [
                'input'    => '9',
                'position' => -1,
                'value'    => '9'
            ],
            'given a valid input and invalid position when check position then return null'                                            => [
                'input'    => '12345',
                'position' => 6,
                'value'    => null
            ],
        ];
    }
}