<?php

namespace Headoo\EcommerceBundle\Controller;

use Headoo\EcommerceBundle\Controller\GenericController;

/**
 * PaymentMethod controller.
 *
 */
class PaymentMethodController extends GenericController
{
    public function __construct()
    {
        parent::__construct('headoo_ecommerce.paymentmethod.entity', 'PaymentMethod');
    }
}
