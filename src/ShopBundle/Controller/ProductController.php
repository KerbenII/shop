<?php

namespace ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class ProductController
 * @package ShopBundle\Controller
 * @Route("/product")
 */
class ProductController extends Controller
{
    /**
     * @Route("/show/{id}")
     */
    public function showAction($id = 1)
    {
        $em = $this->getDoctrine()->getManager();

        $product = $em->getRepository('ShopBundle:Product')
            ->findOneBy(['id' => $id]);

        if (!$product) {
            throw $this->createNotFoundException('Product not found');
        }

        return $this->render('ShopBundle:Product:show.html.twig', array(
            'product' => $product,
        ));
    }
}
