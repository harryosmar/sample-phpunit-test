<?php
/**
 * @author    Harry Osmar Sitohang <hsitohang@wayfair.com>
 * @copyright 2019 Wayfair LLC - All rights reserved
 */

namespace Sample\Model\DTO;

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
    return (100 - $this->discount) / 100 * $this->price;
  }
}