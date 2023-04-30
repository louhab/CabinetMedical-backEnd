<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PatientRepository;
use App\Entity\Patient;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;



class ApiPatientController extends AbstractController{
    private EntityManagerInterface $entityManager;
    
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/api/patients', name: 'app_api_patient', methods: ['GET'] )]
    public function index(PatientRepository $patientRepository) :Response
    {
        $repository = $this->entityManager->getRepository(Patient::class);
        $patients= $repository->findAll();
        $data = [];
        foreach($patients as $patient){
            $data[] = [ 
                'id'=>$patient->getId(),
                'nom' => $patient->getNom(),
                'code'=>$patient->getCodeApci(),
                'email'=>$patient->getEmail(),
                'age'=>$patient->getAge(),
                'ville' => $patient->getVille(),
                'genre'=>$patient->getGenre(),
                'tel'=>$patient->getTel(),
                'lieu'=>'Casablanca',
                'adresse'=>'Casablanca hay Mly Rachid ',
                'gsm'=>'099999999',
                'etatCivil'=>'Célébataire',
                'lienParente'=>'No',
                'nomConjoint'=>'abdou',
                'priseEncharge'=>'iseEncharge',
                'medcin'=>'medcin',
                'grSanguin'=>'grpSanguin',
                'motcles'=>'mots',
                'regimeCnam'=>'gimeCnam',
                'prenom'=>'Prenom',
                'dateNaissance'=>$patient->getDatePrdv(),
                'conjoint'=>$patient->getNomConjoint(),
                'lieuParente'=>$patient->getLieuParente(),
                'nbrEnfant'=>$patient->getNbrEnfant(),
                'taille'=>$patient->getTaille(),
                'poids'=>$patient->getPoids(),
                'groupSanguin'=>$patient->getGroupSanguin(),
                'profession'=>$patient->getProfession(),
                'nCnss'=>$patient->getNCnss(),
                'identUnique'=>$patient->getIdentUnique(),
                'priseEnCharge'=>$patient->getPriseEnCharge(),
                'medcin'=>$patient->getMedcin(),
                'datePrdv'=>$patient->getDatePrdv(),
                'motCles'=>$patient->getMotCles(),
                'codeApci'=>$patient->getCodeApci(),
                'regCnam'=>$patient->getRegCnam(),
                'dateValidite'=>$patient->getDateValidite(),
                'qualitie'=>$patient->getQualitie(),
                'nationalite'=>$patient->getNationalite(),
                'domaine'=>$patient->getDomaine(),
                'assureur'=>$patient->getAssureur(),

            ];
        }
        return new JsonResponse($data);
    }
    #[Route('/api/patients/{id}', name: 'app_api_patient_delete', methods: ['DELETE'] )]
    public function delete(PatientRepository $patientRepository ,$id    ) 
    {
        $patient= $patientRepository->find($id);
         try {
            $this->entityManager->remove($patient);
            $this->entityManager->flush();
            return new Response('oki' ,200);
         }
         catch(e) {
            return new Response(e ,500);
         }
        
    
    }

}
