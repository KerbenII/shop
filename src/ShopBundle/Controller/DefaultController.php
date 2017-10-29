<?php

namespace ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @var integer $page
     * @Route("/{page}")
     */
    public function indexAction($page = 1)
    {
        $page = (int) $page;
        $em = $this->getDoctrine()->getManager();
        $paginator  = $this->get('knp_paginator');

        $fetchProductsQuery = $em->getRepository('ShopBundle:Product')
            ->findAllproductsOrderedByNewest();

        $pagination = $paginator->paginate(
            $fetchProductsQuery,
            $page,
            10
        );

        return $this->render('ShopBundle:Default:index.html.twig', array(
            'pagination' => $pagination
        ));

    }
}
