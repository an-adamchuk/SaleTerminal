<?php
namespace TerminalBundle\Service\Terminal;

use TerminalBundle\Service\Product\DiscountCalculatorInterface;
use TerminalBundle\Service\Product\Repository\PricingInterface;

/**
 * Class SaleTerminal
 * @package TerminalBundle\Service\Terminal
 */
class SalePoint implements SalePointInterface
{
    /**
     * @var DiscountCalculatorInterface
     */
    protected $discountCalculator;

    /**
     * @var PricingInterface
     */
    protected $pricing;

    /**
     * @var
     */
    protected $order = [];

    /**
     * SaleTerminal constructor.
     * @param PricingInterface            $pricing
     * @param DiscountCalculatorInterface $discountCalculator
     */
    public function __construct(
        PricingInterface $pricing,
        DiscountCalculatorInterface $discountCalculator)
    {
        $this->pricing = $pricing;
        $this->discountCalculator = $discountCalculator;
    }

    /**
     * Returns a summary
     * @return string;
     */
    public function getTotalSum()
    {
        $totalSum = 0;
        foreach ($this->order as $order) {
            $totalSum += $this->discountCalculator->getPrice($order['product'], $order['quantity']);
        }

        return $totalSum;
    }

    /**
     * @param null $code
     * @throws \Exception
     */
    public function scan($code = null)
    {
        if (isset($this->order[$code])) {
            $this->order[$code]['quantity'] = $this->order[$code]['quantity'] + 1;
        } else {
            $this->order[$code] = [
                'product' => $this->pricing->getProductByCode($code),
                'quantity' => 1,
            ];
        }
    }
}

