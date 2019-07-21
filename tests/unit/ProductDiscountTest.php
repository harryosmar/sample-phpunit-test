<?php
/**
 * @author    Harry Osmar Sitohang <hsitohang@wayfair.com>
 * @copyright 2019 Wayfair LLC - All rights reserved
 */

namespace Sample\Tests\unit;

use Sample\Factory\ProductDTOFactory;
use Sample\Model\DAO\DiscountDAO;
use Sample\Model\DAO\ProductDAO;

class ProductDiscountTest extends Base {
  /**
   * @test
   * @dataProvider getValidDataProvider
   *
   * @param float $price
   * @param float $discount
   * @param float $expectedDiscountedPrice
   *
   * @return void
   */
  public function givenTheProductIDShouldBeAbleToCalculateDiscountedPrice(
      float $price,
      float $discount,
      float $expectedDiscountedPrice
  ) {
    /**
     * AAA Pattern : Arrange, Act, Assertion
     */
    // Arrange
    $productID = 1;

    $productDAOMock = $this->prophesize(ProductDAO::class);
    $productDAOMock->getPrice($productID)->shouldBeCalled()->willReturn($price);

    $discountDAOMock = $this->prophesize(DiscountDAO::class);
    $discountDAOMock->getDiscount($productID)->shouldBeCalled()->willReturn($discount);

    $productDTOFactory = new ProductDTOFactory($productDAOMock->reveal(), $discountDAOMock->reveal());
    $productDTO        = $productDTOFactory->generateProductDTOByProductID($productID);

    // Act
    $discountedPrice = $productDTO->getDiscountedPrice();

    // Assertion
    $this->assertEquals($expectedDiscountedPrice, $discountedPrice);
  }

  /**
   * @test
   * @dataProvider getInvalidDataProvider
   * @expectedException \Sample\Model\Exception\InvalidDiscountException
   *
   * @param float $price
   * @param float $discount
   *
   * @return void
   */
  public function givenInvalidDiscountThenShouldBeExpectException(float $price, float $discount) {
    // Arrange
    $productID = 1;

    $productDAOMock = $this->prophesize(ProductDAO::class);
    $productDAOMock->getPrice($productID)->shouldBeCalled()->willReturn($price);

    $discountDAOMock = $this->prophesize(DiscountDAO::class);
    $discountDAOMock->getDiscount($productID)->shouldBeCalled()->willReturn($discount);

    $productDTOFactory = new ProductDTOFactory($productDAOMock->reveal(), $discountDAOMock->reveal());
    $productDTO        = $productDTOFactory->generateProductDTOByProductID($productID);

    // Act
    $productDTO->getDiscountedPrice();
  }

  /**
   * @return array
   */
  public function getValidDataProvider() : array {
    return [
        'given a discount then discounted price should be lower than actual price' => [
            'price'                   => 100,
            'discount'                => 30,
            'expectedDiscountedPrice' => 70.0,
        ],
        'given no discount then discounted price should be same with actual price' => [
            'price'                   => 100,
            'discount'                => 0,
            'expectedDiscountedPrice' => 100.0,
        ],
    ];
  }

  /**
   * @return array
   */
  public function getInvalidDataProvider() : array {
    return [
        'given a discount < 0 then throw exception'   => [
            'price'    => 100,
            'discount' => -1
        ],
        'given a discount > 100 then throw exception' => [
            'price'    => 100,
            'discount' => 101
        ],
    ];
  }
}