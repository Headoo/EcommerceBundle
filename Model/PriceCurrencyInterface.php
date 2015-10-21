<?php

namespace Headoo\EcommerceBundle\Model;

interface PriceCurrencyInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();

    /**
     * Set code
     *
     * @param string $code
     *
     * @return self
     */
    public function setCode($code);

    /**
     * Get code
     *
     * @return string
     */
    public function getCode();

}