<?php
declare(strict_types=1);

namespace Sample;


class PositionChecker
{
    /**
     * Notes :
     * 1. Expected value for input string consist of integer values
     * 2. To get last char value use position with value -1
     * 3. If position is not found, because out of range then return null
     * @param string $input
     * @param int $position
     * @return string|null
     * @todo It will be good if there is a feature not only to get 1st last element, but also 2th => -2 position, 3rd => -3, 4th => -4, ...th => ...-th
     */
    public function check(string $input, int $position)
    {
        if ($position === 1) {
            return $this->getFirstChar($input);
        }

        if ($position === -1) {
            return $this->getLastChar($input);
        }

        return $this->getBetweenFirstAndLastChar($input, $position);
    }

    /**
     * @param string $input
     * @return mixed
     */
    private function getFirstChar(string $input)
    {
        preg_match("/^(\d).*/", $input, $matches);

        return $matches[1];
    }


    /**
     * @param string $input
     * @return mixed
     */
    private function getLastChar(string $input)
    {
        preg_match("/.*(\d)$/", $input, $matches);

        return $matches[1];
    }

    /**
     * @param string $input
     * @param int $position
     * @return mixed|null
     */
    private function getBetweenFirstAndLastChar(string $input, int $position)
    {
        --$position;
        preg_match(
            sprintf("/^\d{%d}(\d)\d*$/", $position),
            $input,
            $matches
        );

        if (!isset($matches[1])) {
            return null;
        }

        return $matches[1];
    }
}