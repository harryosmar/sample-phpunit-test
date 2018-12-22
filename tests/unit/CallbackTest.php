<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/22/18
 * Time: 23:12 PM
 */

namespace Sample\Tests\unit;

class Demo {
    private $token = 'ABCDEF';

    /**
     * @param \Closure $callback
     * @param mixed ...$parameters
     * @return mixed
     */
    public function handleClosureParameterWithVariableArgumentLists(\Closure $callback, ...$parameters) {
        return $callback->call($this, ...$parameters);
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }
}


class CallbackTest extends Base
{
    public function testCallback()
    {
        $demo = new Demo();

        $value = $demo->handleClosureParameterWithVariableArgumentLists(
            function (array $list, int $index) {
                /** @var Demo $this */
                return sprintf(
                    '%s-%s',
                    $this->getToken(),
                    $list[$index]
                );
            },
            ['test1', 'test2'],
            1
        );


        $this->assertEquals('ABCDEF-test2', $value);
    }
}