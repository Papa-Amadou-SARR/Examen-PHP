<?php

namespace App\Entity;

use App\Repository\OffreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OffreRepository::class)
 */
class Offre
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
    private $ref;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Objet;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\OneToMany(targetEntity=Cv::class, mappedBy="offre")
     */
    private $idCv;

    /**
     * @ORM\ManyToMany(targetEntity=Entreprise::class, mappedBy="offre")
     */
    private $entreprises;

    public function __construct()
    {
        $this->idCv = new ArrayCollection();
        $this->entreprises = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function setRef(string $ref): self
    {
        $this->ref = $ref;

        return $this;
    }

    public function getObjet(): ?string
    {
        return $this->Objet;
    }

    public function setObjet(string $Objet): self
    {
        $this->Objet = $Objet;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection|Cv[]
     */
    public function getIdCv(): Collection
    {
        return $this->idCv;
    }

    public function addIdCv(Cv $idCv): self
    {
        if (!$this->idCv->contains($idCv)) {
            $this->idCv[] = $idCv;
            $idCv->setOffre($this);
        }

        return $this;
    }

    public function removeIdCv(Cv $idCv): self
    {
        if ($this->idCv->removeElement($idCv)) {
            // set the owning side to null (unless already changed)
            if ($idCv->getOffre() === $this) {
                $idCv->setOffre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Entreprise[]
     */
    public function getEntreprises(): Collection
    {
        return $this->entreprises;
    }

    public function addEntreprise(Entreprise $entreprise): self
    {
        if (!$this->entreprises->contains($entreprise)) {
            $this->entreprises[] = $entreprise;
            $entreprise->addOffre($this);
        }

        return $this;
    }

    public function removeEntreprise(Entreprise $entreprise): self
    {
        if ($this->entreprises->removeElement($entreprise)) {
            $entreprise->removeOffre($this);
        }

        return $this;
    }
}
