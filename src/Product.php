<?php
/**
 * Created by PhpStorm.
 * User: harry
 * Date: 5/15/18
 * Time: 8:01 AM
 */

namespace Sample;

use Sample\Contract\Discount;

class Product
{
    /**
     * @var Discount
     */
    private $discount;

    /**
     * @var int
     */
    private $productId;

    public function __construct(Discount $discount, int $productId)
    {
        $this->discount = $discount;
        $this->productId = $productId;
    }

    public function getDiscountedPrice() : float
    {
        return (1 - $this->discount->getPercentage($this->productId)) * $this->getPrice($this->productId);
    }

    public function getPrice(int $productId) : float
    {
        // add some logic to get product price here
    }
}