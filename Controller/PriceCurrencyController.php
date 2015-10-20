<?php

namespace Headoo\EcommerceBundle\Controller;

use Headoo\EcommerceBundle\Controller\GenericController;

/**
 * PriceCurrency controller.
 *
 */
class PriceCurrencyController extends GenericController
{
    public function __construct()
    {
        parent::__construct('headoo_ecommerce.pricecurrency.entity', 'PriceCurrency');
    }
}
