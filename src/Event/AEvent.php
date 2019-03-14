<?php
/**
 * @author    Harry Osmar Sitohang <hsitohang@wayfair.com>
 * @copyright 2019 Wayfair LLC - All rights reserved
 */

namespace Sample\Event;

use Symfony\Component\EventDispatcher\Event;

class AEvent extends Event {
  /**
   * @return bool
   */
  public function getValue() {
    return true;
  }
}