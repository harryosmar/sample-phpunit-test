<?php
/**
 * @author    Harry Osmar Sitohang <hsitohang@wayfair.com>
 * @copyright 2019 Wayfair LLC - All rights reserved
 */

namespace Sample\Exception;

use LogicException;

class InvalidDiscountException extends LogicException {
  /**
   * InvalidDiscountException constructor.
   *
   * @param int   $productID
   * @param float $discount
   */
  public function __construct(int $productID, float $discount) {
    parent::__construct(sprintf('Invalid discount %f for  product ID %d', $discount, $productID));
  }
}