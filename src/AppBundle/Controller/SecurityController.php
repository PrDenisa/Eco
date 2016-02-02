<?php
/**
 * Created by PhpStorm.
 * User: denisa
 * Date: 01.02.2016
 * Time: 16:23
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login_route")
     */
    public function loginAction()
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render(
            'security/login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $lastUsername,
                'error'         => $error,
            )
        );
    }

    /**
     * @Route("/login_check", name="login_check")
     */
    public function loginCheckAction()
    {
    }
}