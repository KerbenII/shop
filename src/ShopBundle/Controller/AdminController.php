<?php

namespace ShopBundle\Controller;

use ShopBundle\Form\Type\ProductFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class AdminController
 * @package ShopBundle\Controller
 * @Route("/admin")
 */
class AdminController extends Controller
{
    /**
     * @Route("/new-product")
     * @param Request $request
     * @return Response
     */
    public function addProductAction(Request $request)
    {
        $form = $this->createForm(ProductFormType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $product = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            $this->addFlash(
                'success',
                sprintf('Product added succesfully')
            );

            $message = (new \Swift_Message('Hello Email'))
                ->setFrom('noreply@wegrzynek.org')
                ->setTo('fake@example.com')
                ->setBody(
                    $this->renderView(
                        'ShopBundle:Emails:productAdded.html.twig',
                        array('product' => $product)
                    ),
                    'text/html'
                );

            $this->get('mailer')->send($message);

            return $this->redirectToRoute('shop_default_index');
        }
        return $this->render('ShopBundle:Admin:add_product.html.twig', [
            'productForm' => $form->createView()
        ]);
    }

}
