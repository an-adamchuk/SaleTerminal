<?php

namespace TerminalBundle\Service\Product;

/**
 * Class ProductModel
 * @package TerminalBundle\Service\Product
 */
class ProductModel
{
    /**
     * @var string
     */
    public $code;

    /**
     * @var float
     */
    public $price;

    /**
     * @var DiscountModel
     */
    public $discount;

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return DiscountModel
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @param DiscountModel $discount
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }
}