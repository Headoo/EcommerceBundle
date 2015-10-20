<?php

namespace Headoo\EcommerceBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Collections\ArrayCollection;
use Headoo\EcommerceBundle\Controller\GenericController;

/**
 * CustomerGroup controller.
 *
 */
class CustomerGroupController extends GenericController
{
    public function __construct()
    {
        parent::__construct('headoo_ecommerce.customergroup.entity', 'CustomerGroup');
    }
}
