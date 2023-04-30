<?php

namespace App\Repository;

use App\Entity\Patient;
use App\Repository\PatientRepository ;

class PatientRepositoryTest {
    public function testPatient(){
        self::bootKernel();
        $patients=self::$container->get(PatientRepository::class)->count([]);
        $this->assertEquals(10,$patients);
    }
}