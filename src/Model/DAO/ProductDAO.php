<?php
/**
 * @author    Harry Osmar Sitohang <hsitohang@wayfair.com>
 * @copyright 2019 Wayfair LLC - All rights reserved
 */

namespace Sample\Model\DAO;

interface ProductDAO {
  /**
   * @param int $productID
   *
   * @return float
   */
  public function getPrice(int $productID) : float;
}