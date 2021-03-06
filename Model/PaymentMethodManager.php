<?php
    
namespace Headoo\EcommerceBundle\Model;

use Headoo\EcommerceBundle\Model\BaseManager;
use Symfony\Component\DependencyInjection\Container;

class PaymentMethodManager extends BaseManager
{     
    /**
     * Load the payment method with the associated name.
     *
     * @param string $name
     */
    public function loadByName($name)
    {
        return $this->getRepository()->findOneByName($name);
    }

}
