<?php
declare(strict_types=1);

namespace Sample;


class PositionChecker
{
    /**
     * @TODO this script still not handle : - input consist only with 1 char,  - if the position is out of input range, should throw an exception
     * @param string $input
     * @param int $position
     * @return string
     */
    public function check(string $input, int $position): string
    {
        $position = (--$position <= 0) ? 1 : $position;
        preg_match("/^(\d{1,$position})(\d).*$/", $input, $matches);

        return $position === 1 ? $matches[1] : $matches[2];
    }
}