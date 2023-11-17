<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route("/front")
 */
class FrontController extends AbstractController
{
    /**
     * @Route("/app", name="app_front_index", methods={"GET"})
     */
    public function index(ProductRepository $productRepository): Response
    {
        return $this->render('front/index.html.twig', [
            'products' => $productRepository->findAll(),
        ]);
    }

    /**
     * @Route("/products", name="product_list_api", methods={"GET"})
     */
    public function listProducts(ProductRepository $productRepository): Response
    {
        $array = [
            "foo" => "bar",
            "bar" => "foo",
        ];
        $data = $productRepository->findAll() ;
        return $this->json($array);
    }

    /**
     * @Route("/categories", name="catgories_list_api", methods={"GET"})
     */
    public function listCatgories(CategoryRepository $categoryRepository): Response
    {
        $array = [
            "foo" => "bar",
            "bar" => "foo",
        ];

        $data = $categoryRepository->findAll() ;
        return $this->json($array, 200, ["Content-Type" => "application/json"]);
    }
}