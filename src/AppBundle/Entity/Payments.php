<?php
/**
 * Created by PhpStorm.
 * User: denisa
 * Date: 04.02.2016
 * Time: 10:24
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="payments")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\PaymentsRepository")
 */
class Payments
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @ORM\Column(type="integer")
     */
    public $number;

    /**
     * @ORM\Column(type="string", length=50)
     */
    public $explanation;

    /**
     * @ORM\Column(type="integer")
     */
    public $amount;

    /**
     * @ORM\Column(type="datetime")
     */
    public $datetime;
}
