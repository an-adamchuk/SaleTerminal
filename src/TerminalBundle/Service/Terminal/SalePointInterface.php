<?php
namespace TerminalBundle\Service\Terminal;

/**
 * Interface TerminalInterface
 * @package TerminalBundle\Services\Terminal
 */
interface SalePointInterface
{
    /**
     * Returns a summary
     * @return string;
     */
    public function getTotalSum();

    /**
     * Add item
     *
     * @param string $code
     * @return void
     */
    public function scan($code);
}