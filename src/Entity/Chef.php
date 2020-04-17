<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ChefRepository")
 */
class Chef
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Utilisateur", inversedBy="chefs")
     * @ORM\JoinTable(name="Managers")
     */
    private $nom;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Utilisateur", inversedBy="chefs")
     */
    private $prenom;

    public function __construct()
    {
        $this->nom = new ArrayCollection();
        $this->prenom = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getNom(): Collection
    {
        return $this->nom;
    }

    public function addNom(Utilisateur $nom): self
    {
        if (!$this->nom->contains($nom)) {
            $this->nom[] = $nom;
        }

        return $this;
    }

    public function removeNom(Utilisateur $nom): self
    {
        if ($this->nom->contains($nom)) {
            $this->nom->removeElement($nom);
        }

        return $this;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getPrenom(): Collection
    {
        return $this->prenom;
    }

    public function addPrenom(Utilisateur $prenom): self
    {
        if (!$this->prenom->contains($prenom)) {
            $this->prenom[] = $prenom;
        }

        return $this;
    }

    public function removePrenom(Utilisateur $prenom): self
    {
        if ($this->prenom->contains($prenom)) {
            $this->prenom->removeElement($prenom);
        }

        return $this;
    }
}
