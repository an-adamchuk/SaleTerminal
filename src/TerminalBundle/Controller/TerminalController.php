<?php

namespace TerminalBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use TerminalBundle\Service\Terminal\SalePoint;
use FOS\RestBundle\Controller\Annotations\Get;

/**
 * Class TerminalController
 * @package TerminalBundle\Controller
 */
class TerminalController extends FOSRestController implements ClassResourceInterface
{
    /**
     * Gets a total price of the order
     *
     * @Get("/total-sum", name="total-sum")
     *
     * @ApiDoc(
     *   statusCodes = {
     *     200 = "Returned when successful",
     *   }
     * )
     *
     * @param Request $request
     * @return array|View when does not exist
     *
     * @throws \Exception
     */
    public function getTotalPriceAction(Request $request)
    {
        /** @var SalePoint $terminal */
        $terminal = $this->get('terminal.service.sale.point');
        $order = $request->query->get('order');

        if (empty($order) || strlen($order) == 0) {
            throw new \Exception('Product order can\'t be empty.');
        }

        $orders = str_split($order);

        foreach ($orders as $code)
        {
            $terminal->scan($code);
        }

        return ['total_sum' => '$' . $terminal->getTotalSum()];
    }
}