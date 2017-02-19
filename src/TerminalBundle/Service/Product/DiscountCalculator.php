<?php

namespace TerminalBundle\Service\Product;

/**
 * Class DiscountCalculator
 * @package TerminalBundle\Service\Product
 */
class DiscountCalculator implements DiscountCalculatorInterface
{
    /**
     * @param ProductModel $product
     * @param int          $quantity
     * @return float|int
     */
    public function getPrice(ProductModel $product, $quantity)
    {
        $price = 0;
        if ($product->getDiscount() instanceof DiscountModel) {
            $discountQuantity = intval($quantity / $product->getDiscount()->getQuantity());
            $discountPrice = $discountQuantity * $product->getDiscount()->getPrice();
                $quantity -= $discountQuantity * $product->getDiscount()->getQuantity(); //increment quantity without discount
            $price += $discountPrice;
        }

        $price += $product->getPrice() * $quantity;
        
        return $price;
    }
}