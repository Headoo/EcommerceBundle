<?php

namespace Headoo\EcommerceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Headoo\EcommerceBundle\Entity\Service;

/**
 * CustomerGroup
 *
 * @ORM\Table(name="headoo_ecommerce_customer_group")
 * @ORM\Entity(repositoryClass="Headoo\EcommerceBundle\Entity\CustomerGroupRepository")
 */
class CustomerGroup
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
     * @ORM\Column(name="name", type="string", length=50)
     *
     * @Assert\Length(
     *     max=50,
     *     maxMessage="The name is too long."
     * )
     */
    protected $name;

    /**
     * @ORM\OneToMany(targetEntity="Service", mappedBy="customerGroup", cascade={"persist"})
     *
     * * @var ArrayCollection $services
     */
    protected $services;

    public function __construct()
    {
        $this->services = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return CustomerGroup
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get services
     *
     * @return string
     */
    public function getServices()
    {
        return $this->services;
    }
}
