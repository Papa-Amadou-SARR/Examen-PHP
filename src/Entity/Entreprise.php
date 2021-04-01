<?php

namespace App\Entity;

use App\Repository\EntrepriseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EntrepriseRepository::class)
 */
class Entreprise
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
     * @ORM\ManyToMany(targetEntity=offre::class, inversedBy="entreprises")
     */
    private $offre;

    public function __construct()
    {
        $this->offre = new ArrayCollection();
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

    /**
     * @return Collection|offre[]
     */
    public function getOffre(): Collection
    {
        return $this->offre;
    }

    public function addOffre(offre $offre): self
    {
        if (!$this->offre->contains($offre)) {
            $this->offre[] = $offre;
        }

        return $this;
    }

    public function removeOffre(offre $offre): self
    {
        $this->offre->removeElement($offre);

        return $this;
    }
}
