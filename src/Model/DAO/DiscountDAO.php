<?php
/**
 * @author    Harry Osmar Sitohang <hsitohang@wayfair.com>
 * @copyright 2019 Wayfair LLC - All rights reserved
 */

namespace Sample\Model\DAO;

interface DiscountDAO {
  /**
   * @param int $productID
   *
   * @return float
   */
  public function getDiscount(int $productID) : float;
}