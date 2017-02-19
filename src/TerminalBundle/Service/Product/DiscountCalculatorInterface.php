<?php

namespace TerminalBundle\Service\Product;

/**
 * Interface DiscountCalculator
 * @package TerminalBundle\Service\Product
 */
interface DiscountCalculatorInterface
{
  public function getPrice(ProductModel $productModel, $quantity);
}