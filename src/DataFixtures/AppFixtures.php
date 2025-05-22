<?php

namespace App\DataFixtures;

use App\Entity\Doctor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 30; $i++) {
            $doctor = new Doctor();
            $doctor->setFirstname($faker->firstName());
            $doctor->setLastname($faker->lastName());
            $doctor->setSpeciality($faker->jobTitle());
            $doctor->setAddress($faker->streetAddress());  // ✅ bien écrit
            $doctor->setCity($faker->city());
            $doctor->setZip(substr($faker->postcode(), 0, 5)); // pour être sûr que ce soit 5 caractères
            $doctor->setPhone($faker->phoneNumber());

            $manager->persist($doctor);
        }   

        $manager->flush();
    }
}
