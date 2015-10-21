<?php

namespace Headoo\EcommerceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Headoo\EcommerceBundle\Entity\Service;
use Headoo\EcommerceBundle\Model\CustomerGroupInterface;

/**
 * CustomerGroup
 *
 * @ORM\Table(name="headoo_ecommerce_customer_group")
 * @ORM\Entity(repositoryClass="Headoo\EcommerceBundle\Entity\CustomerGroupRepository")
 */
class CustomerGroup implements CustomerGroupInterface
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
     * {@inheritDoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritDoc}
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     */
    public function getServices()
    {
        return $this->services;
    }
}
