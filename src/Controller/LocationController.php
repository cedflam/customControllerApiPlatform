<?php

namespace App\Controller;

use App\Entity\City;
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
        return $this->render('location/index.html.twig', [
            "cities" => $cityRepository->findAll()
        ]);
    }


    /**
     * @Route (
     *     path="/api/cities/{id}",
     *     name="city_detail",
     *     methods={"GET"}
     * )
     *
     * @param City $city
     * @return Response
     */
    public function getCity(City $city)
    {
        return $this->render("location/city_detail.html.twig", [
            "city" => $city
        ]);
    }

    /**
     * Permet d'effectuer des opérations sur un objet de l'api
     * @param City $data
     * @return City
     */
    public function __invoke(City $data): City
    {
        dd($data);
    }
}
