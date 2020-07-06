<?php

namespace App\Entity;

use App\Repository\SalarieEtrangeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SalarieEtrangeRepository::class)
 */
class SalarieEtrange
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
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="integer")
     */
    private $tel;

    /**
     * @ORM\Column(type="date")
     */
    private $date_embauche;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type_sejour;

    /**
     * @ORM\Column(type="integer")
     */
    private $num_sejour;

    /**
     * @ORM\Column(type="date")
     */
    private $date_debu_visa;

    /**
     * @ORM\Column(type="date")
     */
    private $date_fin_visa;

    /**
     * @ORM\ManyToOne(targetEntity=Contrat::class, inversedBy="salaries")
     */
    private $contrat;

    /**
     * @ORM\OneToMany(targetEntity=Client::class, mappedBy="salarieEtranges")
     */
    private $clients;

    public function __construct()
    {
        $this->clients = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
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

    public function getDateEmbauche(): ?\DateTimeInterface
    {
        return $this->date_embauche;
    }

    public function setDateEmbauche(\DateTimeInterface $date_embauche): self
    {
        $this->date_embauche = $date_embauche;

        return $this;
    }

    public function getTypeSejour(): ?string
    {
        return $this->type_sejour;
    }

    public function setTypeSejour(string $type_sejour): self
    {
        $this->type_sejour = $type_sejour;

        return $this;
    }

    public function getNumSejour(): ?int
    {
        return $this->num_sejour;
    }

    public function setNumSejour(int $num_sejour): self
    {
        $this->num_sejour = $num_sejour;

        return $this;
    }

    public function getDateDebuVisa(): ?\DateTimeInterface
    {
        return $this->date_debu_visa;
    }

    public function setDateDebuVisa(\DateTimeInterface $date_debu_visa): self
    {
        $this->date_debu_visa = $date_debu_visa;

        return $this;
    }

    public function getDateFinVisa(): ?\DateTimeInterface
    {
        return $this->date_fin_visa;
    }

    public function setDateFinVisa(\DateTimeInterface $date_fin_visa): self
    {
        $this->date_fin_visa = $date_fin_visa;

        return $this;
    }

    public function getContrat(): ?Contrat
    {
        return $this->contrat;
    }

    public function setContrat(?Contrat $contrat): self
    {
        $this->contrat = $contrat;

        return $this;
    }

    /**
     * @return Collection|Client[]
     */
    public function getClients(): Collection
    {
        return $this->clients;
    }

    public function addClient(Client $client): self
    {
        if (!$this->clients->contains($client)) {
            $this->clients[] = $client;
            $client->setSalarieEtranges($this);
        }

        return $this;
    }

    public function removeClient(Client $client): self
    {
        if ($this->clients->contains($client)) {
            $this->clients->removeElement($client);
            // set the owning side to null (unless already changed)
            if ($client->getSalarieEtranges() === $this) {
                $client->setSalarieEtranges(null);
            }
        }

        return $this;
    }
}
