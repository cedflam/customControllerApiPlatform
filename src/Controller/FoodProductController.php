<?php

namespace App\Controller;

use App\Entity\FoodProduct;
use App\Repository\FoodProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class FoodProductController extends AbstractController
{
    /**
     * @Route(path="/api/food-products/list", name="food_products_list", methods={"GET"})
     * @param FoodProductRepository $foodProductRepository
     * @return Response
     */
    public function index(FoodProductRepository $foodProductRepository): Response
    {
        $products = $foodProductRepository->findAll();

        dd($products);

        return $this->render('food_product/index.html.twig', [
            "products" => $foodProductRepository->findAll()
        ]);
    }
}
