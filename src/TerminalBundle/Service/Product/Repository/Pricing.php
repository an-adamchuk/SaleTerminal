<?php

namespace TerminalBundle\Service\Product\Repository;

use TerminalBundle\Service\Product\DiscountModel;
use TerminalBundle\Service\Product\ProductModel;

/**
 * Class Pricing
 * @package TerminalBundle\Service\Terminal
 */
class Pricing implements PricingInterface
{
    protected $store = [];

    public function __construct()
    {
        $items = [
            'A' => [
                'code' => 'A',
                'price' => 1.25,
                'discount' => [
                    'price' => 3,
                    'quantity' => 3,
                ]
            ],
            'B' => [
                'code' => 'B',
                'price' => 4.25
            ],
            'C' => [
                'code' => 'C',
                'price' => 1,
                'discount' => [
                    'price' => 5,
                    'quantity' => 6,
                ]
            ],
            'D' => [
                'code' => 'D',
                'price' => 0.75,
            ]
        ];

        foreach ($items as $item) {
            /** @var ProductModel $product */
            $product = new ProductModel();
            $product->setCode($item['code']);
            $product->setPrice($item['price']);

            if (isset($item['discount'])) {
                /** @var DiscountModel $discount */
                $discount = new DiscountModel();
                $discount->setPrice($item['discount']['price']);
                $discount->setQuantity($item['discount']['quantity']);
                $product->setDiscount($discount);
            }

            $this->store[$item['code']] = $product;
        }

    }


    /**
     * @param string $code
     * @return ProductModel
     * @throws \Exception
     */
    public function getProductByCode($code)
    {
        if (!array_key_exists($code, $this->store)) {
            throw new \Exception('Product does\'nt exist.');
        }

        return $this->store[$code];
    }
}