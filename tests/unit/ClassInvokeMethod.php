<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 1/23/19
 * Time: 11:47 PM
 */

namespace Sample\Tests\unit;

class StackStepOne
{
    public function __invoke(array $stack)
    {
        $stack[] = 'one';
        return $stack;
    }
}

class StackStepTwo
{
    public function __invoke(array $stack)
    {
        $stack[] = 'two';
        return $stack;
    }
}

class CallableStack
{
    /**
     * @var Callable[]
     */
    private $callableCollection;

    /**
     * @param callable $callable
     *
     * @return self
     */
    public function addCallableToStack(callable $callable): self
    {
        $this->callableCollection[] = $callable;

        return $this;
    }

    public function run()
    {
        $stack = [];
        foreach ($this->callableCollection as $callable) {
            $stack = $callable($stack);
        }
        return $stack;
    }
}

class ClassInvokeMethod extends Base
{
    /**
     * @test
     */
    public function testCallableClass()
    {
        $callableStack = new CallableStack();
        $callableStack->addCallableToStack(new StackStepOne())->addCallableToStack(new StackStepTwo());
        $this->assertEquals(['one', 'two'], $callableStack->run());
    }
}