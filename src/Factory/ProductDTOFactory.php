<?php
/**
 * @author    Harry Osmar Sitohang <hsitohang@wayfair.com>
 * @copyright 2019 Wayfair LLC - All rights reserved
 */

namespace Sample\Factory;

use Sample\Model\DAO\DiscountDAO;
use Sample\Model\DAO\ProductDAO;
use Sample\Model\DTO\ProductDTO;

class ProductDTOFactory {
  /**
   * @var DiscountDAO
   */
  private $discountDAO;

  /**
   * @var ProductDAO
   */
  private $productDAO;

  /**
   * ProductDTO constructor.
   *
   * @param ProductDAO  $productDAO
   * @param DiscountDAO $discountDAO
   */
  public function __construct(ProductDAO $productDAO, DiscountDAO $discountDAO) {
    $this->discountDAO = $discountDAO;
    $this->productDAO  = $productDAO;
  }

  /**
   * @param int $productID
   *
   * @return ProductDTO
   */
  public function generateProductDTOByProductID(int $productID) {
    $productDTO            = new ProductDTO();
    $productDTO->productID = $productID;
    $productDTO->price     = $this->productDAO->getPrice($productID);
    $productDTO->discount  = $this->discountDAO->getDiscount($productID);

    return $productDTO;
  }
}