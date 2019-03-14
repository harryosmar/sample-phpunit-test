<?php
/**
 * @author    Harry Osmar Sitohang <hsitohang@wayfair.com>
 * @copyright 2019 Wayfair LLC - All rights reserved
 */

namespace Sample\Event;

use Sample\Tests\unit\Something;
use Symfony\Component\EventDispatcher\Event;

class BEvent extends Event {
  /**
   * @var Something
   */
  private $something;

  /**
   * BEvent constructor.
   *
   * @param Something $something
   */
  public function __construct(Something $something) {
    $this->something = $something;
  }

  /**
   * @return Something
   */
  public function updateSomething() : Something {
    $this->something->setValid(true);
    return $this->something;
  }

}