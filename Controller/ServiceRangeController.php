<?php

namespace Headoo\EcommerceBundle\Controller;

use Headoo\EcommerceBundle\Controller\GenericController;

/**
 * ServiceRange controller.
 *
 */
class ServiceRangeController extends GenericController
{
    public function __construct()
    {
        parent::__construct('headoo_ecommerce.servicerange.entity', 'ServiceRange');
    }
}
