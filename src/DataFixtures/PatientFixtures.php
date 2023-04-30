<?php

namespace App\DataFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Patient ;
class PatientFixtures extends Fixture {

    public function load(ObjectManager $manager ){
        for($i=0 ; $i <10 ; $i++ ){
            $nationalite = $manager->getRepository(\App\Entity\Nationnalite::class)->findAll();
        
            $domaine = $manager->getRepository(\App\Entity\Domaine::class)->find(1);
            $patient = new Patient();
            $patient
            ->setNom("Patient".$i)
            ->setAge(20)
            ->setAdress("adress".$i)
            ->setVille("ville".$i)
            ->setGenre("genre".$i)
            ->setTel(05005550)
            ->setEmail("email".$i."@email.com")
            ->setNomConjoint("nom_conjoint".$i)
            ->setLieuParente("lieu_parent".$i)  
            ->setNbrEnfant(12)
            ->setTaille(12)
            ->setPoids(12)
            ->setGroupSanguin("A")
            ->setProfession("profession".$i)
            ->setNCnss(1222)
            ->setIdentUnique(12)
            ->setPriseEnCharge("aaa")
            ->setMedcin("medcin")
            ->setDatePrdv(\DateTime::createFromFormat('d-m-Y H:i', '25-12-2001 20:30'))
            ->setDateDrdv(\DateTime::createFromFormat('d-m-Y H:i', '25-12-2001 20:30'))
            ->setMotCles('gfgfgfgfg')
            ->setCodeApci("ddddd")
            ->setRegCnam("ddddd")
            ->setDateValidite("ddddd")
            ->setQualitie("ddddd")
            ->setNationalite($nationalite[0])
            ->setDomaine($domaine);
            $manager->persist($patient);



        }
        $manager->flush();
    }
}