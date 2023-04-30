<?php

namespace App\DataFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Nationnalite ;

class NationnaliteFixtures extends Fixture {

    public function load(ObjectManager $manager ){ 
        $nationnalite = new Nationnalite();   
        $nationnalite->setCode(33);
        $manager->persist($nationnalite);  
        $manager->flush();
    }
}