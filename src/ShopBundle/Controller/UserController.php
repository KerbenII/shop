<?php

namespace ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class UserController extends Controller
{
    /**
     * @Route("/login")
     */
    public function loginAction()
    {
        return $this->render('ShopBundle:User:login.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/logout")
     */
    public function logoutAction()
    {
        return $this->render('ShopBundle:User:logout.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/register")
     */
    public function registerAction()
    {
        return $this->render('ShopBundle:User:register.html.twig', array(
            // ...
        ));
    }

}
