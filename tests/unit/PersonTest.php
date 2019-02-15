<?php
/**
 * Created by PhpStorm.
 * User: harryosmar
 * Date: 2/15/19
 * Time: 10:37 PM
 */

namespace Sample\Tests\unit;

use Sample\Person;

class PersonTest extends Base
{
    /**
     * @test
     */
    public function shouldBeAbleToInstantiatePersonWithSharedAbilities()
    {
        $spongebob = new Person('spongebob');
        $patrick = new Person('patrick');

        $spongebob->addAbility('to be funny')->addAbility('breath inside the water');
        $patrick->addAbility('shine');
        $abilities = ['to be funny', 'breath inside the water', 'shine'];

        /**
         * All the person objects, will shared the same abilities, isn't it great ? Equality for all.
         */
        $this->assertEquals($abilities, $patrick->getAbility());
        $this->assertEquals($abilities, $spongebob->getAbility());
    }
}