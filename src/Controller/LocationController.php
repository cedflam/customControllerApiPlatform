<?php

namespace App\Controller;


use App\Repository\CityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LocationController extends AbstractController
{
    /**
     * @Route(
     *     path="/api/cities/list",
     *     name="cities_list",
     *     methods={"GET"},
     * )
     * @param CityRepository $cityRepository
     * @return Response
     */
    public function getCities(CityRepository $cityRepository)
    {
        $cities = $cityRepository->findAll();

        return $this->render('location/index.html.twig', [
            "cities" => $cities
        ]);
    }
}
