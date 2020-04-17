<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeCongeRepository")
 */
class TypeConge
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
    private $nom;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nbre_jour;

    /**
     * @ORM\Column(type="boolean")
     */
    private $paiement;


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
     * @return mixed
     */
    public function getNbreJour()
    {
        return $this->nbre_jour;
    }

    /**
     * @param mixed $nbre_jour
     */
    public function setNbreJour($nbre_jour): void
    {
        $this->nbre_jour = $nbre_jour;
    }

    /**
     * @return mixed
     */
    public function getPaiement()
    {
        return $this->paiement;
    }

    /**
     * @param mixed $paiement
     */
    public function setPaiement($paiement): void
    {
        $this->paiement = $paiement;
    }

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Conge", mappedBy="conge")
     */
    private $types;

    public function __construct()
    {
        $this->types = new ArrayCollection();
    }

    /**
     * @return Collection|Conge[]
     */
    public function getTypes(): Collection
    {
        return $this->types;
    }

    public function __toString()
    {
return $this->getNom();   }


}
