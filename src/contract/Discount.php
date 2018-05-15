<?php
/**
 * Created by PhpStorm.
 * User: harry
 * Date: 5/15/18
 * Time: 7:59 AM
 */

namespace Sample\Contract;

interface Discount
{
    public function getPercentage(int $productId) : float;
}