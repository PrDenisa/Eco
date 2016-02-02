<?php
/**
 * Created by PhpStorm.
 * User: denisa
 * Date: 02.02.2016
 * Time: 16:45
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AdminController
 *
 * @Route("/admin")
 */
class AdminController extends Controller
{
    /**
     * @Route("/", name="adminHomepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('admin/index.html.twig');
    }
}