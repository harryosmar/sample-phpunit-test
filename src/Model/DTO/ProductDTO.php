<?php
/**
 * @author    Harry Osmar Sitohang <hsitohang@wayfair.com>
 * @copyright 2019 Wayfair LLC - All rights reserved
 */

namespace Sample\Model\DTO;

use Sample\Model\Exception\InvalidDiscountException;

class ProductDTO {
  /**
   * @var int
   */
  public $productID;

  /**
   * @var float
   */
  public $price;

  /**
   * @var float
   */
  public $discount;

  /**
   * @return float
   */
  public function getDiscountedPrice() : float {
    if ($this->discount < 0 || $this->discount > 100) {
      throw new InvalidDiscountException($this->productID, $this->discount);
    }

    return (100 - $this->discount) / 100 * $this->price;
  }
}