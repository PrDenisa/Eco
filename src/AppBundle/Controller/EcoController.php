<?php
/**
 * Created by PhpStorm.
 * User: denisa
 * Date: 01.02.2016
 * Time: 15:53
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EcoController extends Controller
{
    /**
     * @Route("/")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        return $this->render('eco/index.html.twig');
    }
}