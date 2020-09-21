<?php

namespace App\DataFixtures;

use App\Entity\Family;
use App\Entity\MusicInstrument;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    const STATE = [
        'Bon etat',
        'Etat moyen',
        'Excellent état'
    ];

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create("fr_FR");
        $userAdmin = new User();
        $userAdmin->setAddress("10 rue des epiceas le soler")
            ->setEmail("sl0ders@gmail.com")
            ->setFirstname("Quentin")
            ->setLastname("Sommesous")
            ->setIsSeller(true)
            ->setRoles(['ROLE_USER', 'ROLE_ADMIN'])
            ->setNumberPhone(670017086)
            ->setPassword($this->encoder->encodePassword($userAdmin, 258790));
        $manager->persist($userAdmin);
        for ($i = 1; $i <= 30; $i++) {
            $user = new User();
            $user
                ->setAddress($faker->address)
                ->setEmail($faker->email)
                ->setFirstname($faker->firstName)
                ->setLastname($faker->lastName)
                ->setIsSeller($faker->boolean)
                ->setRoles(['ROLE_USER'])
                ->setNumberPhone($faker->phoneNumber)
                ->setPassword($this->encoder->encodePassword($userAdmin, $faker->password));
            $manager->persist($user);
            $manager->flush();
        }

        for( $i = 1; $i <= 10; $i++){
            $family = new Family();
            $family->setName($faker->name);
            $manager->persist($family);
            $manager->flush();
        }
        $families = $manager->getRepository(Family::class)->findAll();
        $users = $manager->getRepository(User::class)->findBy(['isSeller' => true]);
        for( $i = 1; $i <= 30; $i++){
            $instrument = new MusicInstrument();
            $instrument->setAge($faker->dateTime)
                ->setDescription($faker->text(200))
                ->setFamily($faker->randomElement($families))
                ->setName($faker->name)
                ->setPrice($faker->numberBetween(10, 155))
                ->setSaleDate($faker->dateTime)
                ->setSeller($faker->randomElement($users))
                ->setState($faker->randomElement(self::STATE));
            $manager->persist($instrument);
        }
        $manager->flush();
    }
}
