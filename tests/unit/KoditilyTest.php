<?php
declare(strict_types=1);

namespace Sample\Tests\unit;


class KoditilyTest extends Base
{
    /**
     * @dataProvider getDataProvider
     * @test
     */
    public function testSolution(array $parameter, $expectedValue)
    {
        $value = $this->solution($parameter);

        $this->assertEquals($expectedValue, $value);
    }

    /**
     * @param array $a
     * @return float|int|null
     */
    public function solution(array $a)
    {
        $minDistanceValue = null;
        $minDistanceIndex = null;

        for ($i = 0; $i < count($a); $i++) {
            $value1 = $a[$i];
            for ($j = 1; $j < count($a); $j++) {
                $value2        = $a[$j];
                $distance      = abs($value1 - $value2);
                $distanceIndex = abs($i - $j);
                if ($minDistanceValue === null
                    || ($distance != 0 && $distance < $minDistanceValue)
                ) {
                    $minDistanceValue = $distance;
                    $minDistanceIndex = $distanceIndex;
                } else {
                    if ($distance === $minDistanceValue && $i !== $j && $distanceIndex < $minDistanceIndex) {
                        $minDistanceIndex = $distanceIndex;
                    }
                }
            }
        }

        return $minDistanceIndex;
    }

    public function getDataProvider()
    {
        return [
            [
                'parameter'     => [1, 4, 7, 3, 3, 5],
                'expectedValue' => 2,
            ],
            [
                'parameter'     => [1, 4, 7, 7, 7, 7, 8],
                'expectedValue' => 1,
            ],
            [
                'parameter'     => [-1, 5, 10, 3, 7, 0],
                'expectedValue' => 5,
            ],
            [
                'parameter'     => [0, 4, 4, 4, 4, 7, 9, 5],
                'expectedValue' => 3,
            ],
        ];
    }
}