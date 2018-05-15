<?php
/**
 * Created by PhpStorm.
 * User: harry
 * Date: 5/15/18
 * Time: 7:57 AM
 */

namespace Sample\Tests\unit;

class assertionTest extends Base
{
    public function testAssertion()
    {
        $this->assertEquals(3, 1 + 2);
    }
}