<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContratRepository")
 */
class Contrat
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
    private $type;
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Utilisateur", mappedBy="contrat")
     */
    private $utilisateurs;

    /**
     * @ORM\OneToMany(targetEntity=SalarieEtrange::class, mappedBy="contrat")
     */
    private $salaries;

    public function __construct()
    {
        $this->utilisateurs = new ArrayCollection();
        $this->salaries = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getUtilisateurs(): Collection
    {
        return $this->utilisateurs;
    }

    public function addUtilisateur(Utilisateur $utilisateur): self
    {
        if (!$this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs[] = $utilisateur;
            $utilisateur->setContrat($this);
        }

        return $this;
    }

    public function removeUtilisateur(Utilisateur $utilisateur): self
    {
        if ($this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs->removeElement($utilisateur);
            // set the owning side to null (unless already changed)
            if ($utilisateur->getContrat() === $this) {
                $utilisateur->setContrat(null);
            }
        }

        return $this;
    }


public function __toString()
{
    return $this->type;
}

/**
 * @return Collection|SalarieEtrange[]
 */
public function getSalaries(): Collection
{
    return $this->salaries;
}

public function addSalary(SalarieEtrange $salary): self
{
    if (!$this->salaries->contains($salary)) {
        $this->salaries[] = $salary;
        $salary->setContrat($this);
    }

    return $this;
}

public function removeSalary(SalarieEtrange $salary): self
{
    if ($this->salaries->contains($salary)) {
        $this->salaries->removeElement($salary);
        // set the owning side to null (unless already changed)
        if ($salary->getContrat() === $this) {
            $salary->setContrat(null);
        }
    }

    return $this;
}


}
