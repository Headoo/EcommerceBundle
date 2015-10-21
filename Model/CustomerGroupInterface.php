<?php

namespace Headoo\EcommerceBundle\Model;

interface CustomerGroupInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();

    /**
     * Set name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName($name);

    /**
     * Get name
     *
     * @return string
     */
    public function getName();

    /**
     * Get services
     *
     * @return string
     */
    public function getServices();
}