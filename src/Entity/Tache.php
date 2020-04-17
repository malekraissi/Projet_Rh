<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TacheRepository")
 */
class Tache
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tache;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $duree;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Projet", inversedBy="taches")
     */
    private $projet;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Utilisateur", inversedBy="taches")
     */
    private $ressource;

    public function __construct()
    {
        $this->ressource = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTache(): ?string
    {
        return $this->tache;
    }

    public function setTache(string $tache): self
    {
        $this->tache = $tache;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(string $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getProjet(): ?Projet
    {
        return $this->projet;
    }

    public function setProjet(?Projet $projet): self
    {
        $this->projet = $projet;

        return $this;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getRessource(): Collection
    {
        return $this->ressource;
    }

    public function addRessource(Utilisateur $ressource): self
    {
        if (!$this->ressource->contains($ressource)) {
            $this->ressource[] = $ressource;
        }

        return $this;
    }

    public function removeRessource(Utilisateur $ressource): self
    {
        if ($this->ressource->contains($ressource)) {
            $this->ressource->removeElement($ressource);
        }

        return $this;
    }
}
