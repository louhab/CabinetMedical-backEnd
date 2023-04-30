<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PatientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Assureur ;
#[ORM\Entity(repositoryClass: PatientRepository::class)]
#[ApiResource]
class Patient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $age = null;

    #[ORM\Column(length: 255)]
    private ?string $adress = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\Column(length: 255)]
    private ?string $genre = null;

    #[ORM\Column(length: 255)]
    private ?string $tel = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $nomConjoint = null;

    #[ORM\Column(length: 255)]
    private ?string $lieuParente = null;

    #[ORM\Column(length: 255)]
    private ?string $nbrEnfant = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?string $taille = null;

    #[ORM\Column(length: 255)]
    private ?string $poids = null;

    #[ORM\Column(length: 255)]
    private ?string $groupSanguin = null;

    #[ORM\Column(length: 255)]
    private ?string $profession = null;

    #[ORM\Column(length: 255)]
    private ?string $nCnss = null;

    #[ORM\Column(length: 255)]
    private ?string $identUnique = null;

    #[ORM\Column(length: 255)]
    private ?string $priseEnCharge = null;

    #[ORM\Column(length: 255)]
    private ?string $medcin = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datePrdv = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateDrdv = null;

    #[ORM\Column(length: 255)]
    private ?string $motCles = null;

    #[ORM\Column(length: 255)]
    private ?string $codeApci = null;

    #[ORM\Column(length: 255)]
    private ?string $regCnam = null;

    #[ORM\Column(length: 255)]
    private ?string $dateValidite = null;

    #[ORM\Column(length: 255)]
    private ?string $qualitie = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Nationnalite $nationalite = null;

    #[ORM\ManyToOne]
    private ?Domaine $domaine = null;

    #[ORM\ManyToOne]
    private ?assureur $assureur = null;

    #[ORM\OneToMany(mappedBy: 'patient', targetEntity: Rdv::class, orphanRemoval: true)]
    private Collection $rdvs;

    #[ORM\OneToMany(mappedBy: 'patient', targetEntity: Consultation::class, orphanRemoval: true)]
    private Collection $consultations;

    #[ORM\OneToMany(mappedBy: 'patient', targetEntity: Reglement::class, orphanRemoval: true)]
    private Collection $reglements;

    public function __construct()
    {
        $this->rdvs = new ArrayCollection();
        $this->consultations = new ArrayCollection();
        $this->reglements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getNomConjoint(): ?string
    {
        return $this->nomConjoint;
    }

    public function setNomConjoint(string $nomConjoint): self
    {
        $this->nomConjoint = $nomConjoint;

        return $this;
    }

    public function getLieuParente(): ?string
    {
        return $this->lieuParente;
    }

    public function setLieuParente(string $lieuParente): self
    {
        $this->lieuParente = $lieuParente;

        return $this;
    }

    public function getNbrEnfant(): ?string
    {
        return $this->nbrEnfant;
    }

    public function setNbrEnfant(string $nbrEnfant): self
    {
        $this->nbrEnfant = $nbrEnfant;

        return $this;
    }

    public function getTaille(): ?string
    {
        return $this->taille;
    }

    public function setTaille(string $taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    public function getPoids(): ?string
    {
        return $this->poids;
    }

    public function setPoids(string $poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    public function getGroupSanguin(): ?string
    {
        return $this->groupSanguin;
    }

    public function setGroupSanguin(string $groupSanguin): self
    {
        $this->groupSanguin = $groupSanguin;

        return $this;
    }

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(string $profession): self
    {
        $this->profession = $profession;

        return $this;
    }

    public function getNCnss(): ?string
    {
        return $this->nCnss;
    }

    public function setNCnss(string $nCnss): self
    {
        $this->nCnss = $nCnss;

        return $this;
    }

    public function getIdentUnique(): ?string
    {
        return $this->identUnique;
    }

    public function setIdentUnique(string $identUnique): self
    {
        $this->identUnique = $identUnique;

        return $this;
    }

    public function getPriseEnCharge(): ?string
    {
        return $this->priseEnCharge;
    }

    public function setPriseEnCharge(string $priseEnCharge): self
    {
        $this->priseEnCharge = $priseEnCharge;

        return $this;
    }

    public function getMedcin(): ?string
    {
        return $this->medcin;
    }

    public function setMedcin(string $medcin): self
    {
        $this->medcin = $medcin;

        return $this;
    }

    public function getDatePrdv(): ?\DateTimeInterface
    {
        return $this->datePrdv;
    }

    public function setDatePrdv(\DateTimeInterface $datePrdv): self
    {
        $this->datePrdv = $datePrdv;

        return $this;
    }

    public function getDateDrdv(): ?\DateTimeInterface
    {
        return $this->dateDrdv;
    }

    public function setDateDrdv(\DateTimeInterface $dateDrdv): self
    {
        $this->dateDrdv = $dateDrdv;

        return $this;
    }

    public function getMotCles(): ?string
    {
        return $this->motCles;
    }

    public function setMotCles(string $motCles): self
    {
        $this->motCles = $motCles;

        return $this;
    }

    public function getCodeApci(): ?string
    {
        return $this->codeApci;
    }

    public function setCodeApci(string $codeApci): self
    {
        $this->codeApci = $codeApci;

        return $this;
    }

    public function getRegCnam(): ?string
    {
        return $this->regCnam;
    }

    public function setRegCnam(string $regCnam): self
    {
        $this->regCnam = $regCnam;

        return $this;
    }

    public function getDateValidite(): ?string
    {
        return $this->dateValidite;
    }

    public function setDateValidite(string $dateValidite): self
    {
        $this->dateValidite = $dateValidite;

        return $this;
    }

    public function getQualitie(): ?string
    {
        return $this->qualitie;
    }

    public function setQualitie(string $qualitie): self
    {
        $this->qualitie = $qualitie;

        return $this;
    }

    public function getNationalite(): ?Nationnalite
    {
        return $this->nationalite;
    }

    public function setNationalite(?Nationnalite $nationalite): self
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    public function getDomaine(): ?Domaine
    {
        return $this->domaine;
    }

    public function setDomaine(?Domaine $domaine): self
    {
        $this->domaine = $domaine;

        return $this;
    }

    public function getAssureur(): ?assureur
    {
        return $this->assureur;
    }

    public function setAssureur(?assureur $assureur): self
    {
        $this->assureur = $assureur;

        return $this;
    }

    /**
     * @return Collection<int, Rdv>
     */
    public function getRdvs(): Collection
    {
        return $this->rdvs;
    }

    public function addRdv(Rdv $rdv): self
    {
        if (!$this->rdvs->contains($rdv)) {
            $this->rdvs->add($rdv);
            $rdv->setPatient($this);
        }

        return $this;
    }

    public function removeRdv(Rdv $rdv): self
    {
        if ($this->rdvs->removeElement($rdv)) {
            // set the owning side to null (unless already changed)
            if ($rdv->getPatient() === $this) {
                $rdv->setPatient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Consultation>
     */
    public function getConsultations(): Collection
    {
        return $this->consultations;
    }

    public function addConsultation(Consultation $consultation): self
    {
        if (!$this->consultations->contains($consultation)) {
            $this->consultations->add($consultation);
            $consultation->setPatient($this);
        }

        return $this;
    }

    public function removeConsultation(Consultation $consultation): self
    {
        if ($this->consultations->removeElement($consultation)) {
            // set the owning side to null (unless already changed)
            if ($consultation->getPatient() === $this) {
                $consultation->setPatient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Reglement>
     */
    public function getReglements(): Collection
    {
        return $this->reglements;
    }

    public function addReglement(Reglement $reglement): self
    {
        if (!$this->reglements->contains($reglement)) {
            $this->reglements->add($reglement);
            $reglement->setPatient($this);
        }

        return $this;
    }

    public function removeReglement(Reglement $reglement): self
    {
        if ($this->reglements->removeElement($reglement)) {
            // set the owning side to null (unless already changed)
            if ($reglement->getPatient() === $this) {
                $reglement->setPatient(null);
            }
        }

        return $this;
    }
}
