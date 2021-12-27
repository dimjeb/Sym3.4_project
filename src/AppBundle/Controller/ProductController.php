<?php

namespace AppBundle\Controller;

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
        $products = [];
        for ($i = 1; $i <= 10; $i++) {
            $products[] = rand(1, 100);
    }
        return $this->render('@App/product/index.html.twig', ['products' => $products]);
    }

    /**
     * @Route("/products/{id}", name="product_item", requirements={"id": "[0-9]+"})
     * @param $id
     * @return Response
     */
    public function showAction($id): Response
    {
        return $this -> render('@App/product/show.html.twig', ['id' => $id]);
    }
}