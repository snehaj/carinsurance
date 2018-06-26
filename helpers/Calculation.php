<?php

/**
 * Insly Helpers
 *
 * @author Sneha
 */

namespace Insti\Helpers;

class Calculation 
{

    /**
     * Commission
     *
     * @var int
     */
    private $commission;

    /**
     * Instalments
     *
     * @var int
     */
    private $instalments;

    /**
     * Tax
     *
     * @var int
     */
    private $tax;

    /**
     * BasePrice
     *
     * @var int
     */
    private $baseprice;

    /**
     * CarPrice
     *
     * @var int
     */
    private $carprice;

    /**
     * Result
     *
     * @var int
     */
    private $result = [];

    /**
     * Constructor log
     *
     * @return void
     */
    public function __construct(array $params) 
    {
        $this->baseprice = $params['baseprice'];
        $this->carprice = $params['carprice'];
        $this->instalments = $params['instalments'];
        $this->commission = $params['commission'];
        $this->tax = $params['tax'];
    }

    /**
     * Process Calculations
     *
     * @return array
     */
    public function processValues(): array 
    {
        $this->result['baseTotal'] = $this->baseprice * $this->carprice / 100;
        $this->result['commissionTotal'] = $this->commission * $this->result['baseTotal'] / 100;
        $this->result['taxTotal'] = $this->tax * $this->result['baseTotal'] / 100;
        $this->result['total'] = $this->result['baseTotal'] + $this->result['commissionTotal'] + $this->result['taxTotal'];
        $this->calculatePremiums();

        return $this->result;
    }

    /**
     * Process calculate Premiums
     *
     * @return array
     */
    private function calculatePremiums(): void 
    {
        $this->result['basepremium'] = $this->result['baseTotal'] / $this->instalments;
        $this->result['commisionvalue'] = $this->result['commissionTotal'] / $this->instalments;
        $this->result['taxValue'] = $this->result['taxTotal'] / $this->instalments;
        $this->result['termtotal'] = $this->result['basepremium'] + $this->result['commisionvalue'] + $this->result['taxValue'];
    }

}
