<?php

namespace App\DataFixtures;

use App\Entity\FoodProduct;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Faker;

class AppFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {

        $faker = Faker\Factory::create('fr_FR');

        $products = ['Bananes', 'Poireaux', 'Pommes', 'Pâtes', 'Beurre', 'Pommes de terre'];

        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->setFirstName($faker->firstName)
                ->setLastName($faker->lastName)
                ->setEmail($faker->email)
                ->setPassword($this->encoder->encodePassword($user, 'password'))
                ->setPhone(mt_rand(33611111111, 33699999999))
                ->setRoles(['ROLE_USER']);

            for ($j = 0; $j < 10; $j++){
                $product = new FoodProduct();
                $product->setProductName($faker->randomElement($products))
                        ->setAvailable(rand(0,1))
                        ->setCreatedAt($faker->dateTimeBetween('-30Days', 'now'))
                        ->setExpiratedAt($faker->dateTimeBetween('now', '30Days'))
                        ->setDescription($faker->sentence(20))
                        ->setImageUrl('http://www.placehold.it/200X200')
                        ->setUser($user)
                ;

                $manager->persist($product);
            }
           $manager->persist($user);
        }
        $manager->flush();
    }
}
