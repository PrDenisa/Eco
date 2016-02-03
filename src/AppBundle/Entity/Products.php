<?php
/**
 * Created by PhpStorm.
 * User: denisa
 * Date: 03.02.2016
 * Time: 15:30
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="products")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ProductsRepository")
 */
class Products
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @ORM\Column(type="string", length=25, unique=true)
     */
    public $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    public $stockAvailable;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    public $totalStock;

    /**
     * @ORM\Column(type="integer")
     */
    public $price;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    public $vat;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    public $isActive;
}