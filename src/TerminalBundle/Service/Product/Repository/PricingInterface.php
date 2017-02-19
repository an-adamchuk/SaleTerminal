<?php

namespace TerminalBundle\Service\Product\Repository;

use TerminalBundle\Service\Product\ProductModel;

/**
 * Interface PricingInterface
 */
interface PricingInterface
{
    /**
     * @param string $code
     * @return ProductModel
     */
    public function getProductByCode($code);
}