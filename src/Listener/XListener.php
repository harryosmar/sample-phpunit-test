<?php
/**
 * @author    Harry Osmar Sitohang <hsitohang@wayfair.com>
 * @copyright 2019 Wayfair LLC - All rights reserved
 */

namespace Sample\Listener;

use Sample\Event\BEvent;
use Symfony\Component\EventDispatcher\EventDispatcher;

class XListener {
  public function __invoke(BEvent $event, string $eventName, EventDispatcher $eventDispatcher) {
    $event->updateSomething();
  }
}