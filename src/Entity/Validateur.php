<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ValidateurRepository")
 */
class Validateur
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
    private $RH;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRH(): ?string
    {
        return $this->RH;
    }

    public function setRH(string $RH): self
    {
        $this->RH = $RH;

        return $this;
    }
}
