<?php
/**
 * Created by PhpStorm.
 * User: harryosmar
 * Date: 2/15/19
 * Time: 10:34 PM
 */

namespace Sample;


class Person
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private static $ability = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function getAbility(): array
    {
        return self::$ability;
    }

    /**
     * @param string $ability
     * @return self
     */
    public function addAbility(string $ability)
    {
        self::$ability[] = $ability;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}