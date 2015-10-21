<?php

namespace Headoo\EcommerceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Headoo\EcommerceBundle\Model\PriceCurrencyInterface;

/**
 * PriceCurrency
 *
 * @ORM\Table(name="headoo_ecommerce_price_currency")
 * @ORM\Entity(repositoryClass="Headoo\EcommerceBundle\Entity\PriceCurrencyRepository")
 */
class PriceCurrency implements PriceCurrencyInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=3)
     *
     * @Assert\Currency
     */
    protected $code;

    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritDoc}
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCode()
    {
        return $this->code;
    }
        
}
