<?php

namespace App\Entity;

use App\Repository\CvRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CvRepository::class)
 */
class Cv
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="integer")
     */
    private $Age;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NiveauEtude;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ExperienceProf;

    /**
     * @ORM\ManyToOne(targetEntity=demandeur::class, inversedBy="cvs")
     */
    private $demandeur;

    /**
     * @ORM\ManyToOne(targetEntity=Offre::class, inversedBy="idCv")
     */
    private $offre;

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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->Age;
    }

    public function setAge(int $Age): self
    {
        $this->Age = $Age;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): self
    {
        $this->Adresse = $Adresse;

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

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getNiveauEtude(): ?string
    {
        return $this->NiveauEtude;
    }

    public function setNiveauEtude(string $NiveauEtude): self
    {
        $this->NiveauEtude = $NiveauEtude;

        return $this;
    }

    public function getExperienceProf(): ?string
    {
        return $this->ExperienceProf;
    }

    public function setExperienceProf(string $ExperienceProf): self
    {
        $this->ExperienceProf = $ExperienceProf;

        return $this;
    }

    public function getDemandeur(): ?demandeur
    {
        return $this->demandeur;
    }

    public function setDemandeur(?demandeur $demandeur): self
    {
        $this->demandeur = $demandeur;

        return $this;
    }

    public function getOffre(): ?Offre
    {
        return $this->offre;
    }

    public function setOffre(?Offre $offre): self
    {
        $this->offre = $offre;

        return $this;
    }
}
