<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 *
 */
class ProductController extends Controller
{
    /**
     * @Route("/products", name="product_list")
     */
    public function indexAction()
    {
        $products = $this -> getDoctrine() -> getRepository('AppBundle:Product') -> findActive();
        return $this->render('@App/product/index.html.twig', ['products' => $products]);
    }

    /**
     * @Route("/products/{id}", name="product_item", requirements={"id": "[0-9]+"})
     * @param $id
     * @return Response
     */
    public function showAction(Product $product)
    {
        return $this -> render('@App/product/show.html.twig', ['product' => $product]);
    }
}