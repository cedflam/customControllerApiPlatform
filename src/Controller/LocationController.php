<?php

namespace App\Controller;

use App\Entity\City;
use App\Repository\CityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class LocationController extends AbstractController
{

    private $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

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
}
