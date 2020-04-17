<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CongeRepository")
 */
class Conge
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="integer")
     */
    private $tel;



    /**
     * @ORM\Column(type="date")
     */
    private $date_deb;



    /**
     * @ORM\Column(type="date")
     */
    private $date_fin;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbre_jour;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;



    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statut;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(int $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateDeb()
    {
        return $this->date_deb;
    }

    /**
     * @param mixed $date_deb
     */
    public function setDateDeb($date_deb): void
    {
        $this->date_deb = $date_deb;
    }

    /**
     * @return mixed
     */
    public function getDateFin()
    {
        return $this->date_fin;
    }

    /**
     * @param mixed $date_fin
     */
    public function setDateFin($date_fin): void
    {
        $this->date_fin = $date_fin;
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
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse): void
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * @param mixed $statut
     */
    public function setStatut($statut): void
    {
        $this->statut = $statut;
    }
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeConge", inversedBy="types")
     */
    private $typeconge;

    public function getTypeConge(): ?Conge
    {
        return $this->typecongeconge;
    }

    public function setTypeConge(?TypeConge $typeconge): self
    {
        $this->typecongeconge = $typeconge;

        return $this;
    }



}
