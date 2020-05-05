<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UtilisateurRepository")
 */
class Utilisateur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email."
     * )
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="integer")
     */
    private $matricule;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $civilite;


    /**
     * @ORM\Column(type="integer")
     */
    private $nbre_enfant;

    /**
     * @return mixed
     */
    public function getNbreEnfant()
    {
        return $this->nbre_enfant;
    }

    /**
     * @param mixed $nbre_enfant
     */
    public function setNbreEnfant($nbre_enfant): void
    {
        $this->nbre_enfant = $nbre_enfant;
    }


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
    private $situation_familiale;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $universite;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $diplome;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $specialite;

    /**
     * @ORM\Column(type="integer")
     */
    private $annee_obtination;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $langage;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;



    /**
     * @ORM\Column(type="date")
     */
    private $date_naiss;

    /**
     * @ORM\Column(type="integer")
     */
    private $cin;

    /**
     * @ORM\Column(type="date")
     */
    private $date_cin;


    /**
     * @ORM\Column(type="integer")
     */
    private $num_cnss;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="integer")
     */
    private $code_postal;

    /**
     * @ORM\Column(type="integer")
     */
    private $tel1;

    /**
     * @ORM\Column(type="integer")
     */
    private $tel2;


    /**
     * @ORM\Column(type="integer" ,nullable = true)
     */
    private $rib;

    /**
     * @ORM\Column(type="string", length=255 ,nullable = true)
     */
    private $mail_pro;


    /**
     * @ORM\Column(type="string", length=255 ,nullable = true)
     */
    private $nom1_urgence;

    /**
     * @ORM\Column(type="string", length=255 ,nullable = true)
     */
    private $prenom1_urgence;


    /**
     * @ORM\Column(type="string", length=255 ,nullable = true)
     */
    private $lien1;

    /**
     * @ORM\Column(type="string", length=255 ,nullable = true)
     */
    private $lieu;

    /**
     * @ORM\Column(type="string", length=255 ,nullable = true)
     */
    private $telephone1;

    /**
     * @ORM\Column(type="string", length=255 ,nullable = true)
     */
    private $nom2_urgence;

    /**
     * @ORM\Column(type="string", length=255 ,nullable = true)
     */
    private $prenom2_urgence;


    /**
     * @ORM\Column(type="string", length=255 ,nullable = true)
     */
    private $lien2;


    /**
     * @ORM\Column(type="string", length=255 , nullable = true)
     */
    private $telephone2;

    /**
     * @ORM\Column(type="date" , nullable = true)
     */
    private $date_deb;

    /**
     * @ORM\Column(type="date" ,nullable = true)
     */
    private $date_fin;

    /**
     * @ORM\Column(type="string" ,nullable = true)
     */
    private $periode_essai;


    /**
     * @ORM\Column(type="date" ,nullable = true)
     */
    private $date_embauche;


    /**
     * @ORM\Column(type="date" ,nullable = true)
     */
    private $date_depart;

    /**
     * @ORM\Column(type="text" ,nullable = true)
     */
    private $raison;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Contrat", inversedBy="utilisateurs")
     */
    private $contrat;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Equipe", inversedBy="utilisateurs")
     */
    private $equipes;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Tache", mappedBy="ressource")
     */
    private $taches;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Chef", inversedBy="utilisateurs")
     */
    private $chefs;








    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * @param mixed $lieu
     */
    public function setLieu($lieu): void
    {
        $this->lieu = $lieu;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * @param mixed $matricule
     */
    public function setMatricule($matricule): void
    {
        $this->matricule = $matricule;
    }

    /**
     * @return mixed
     */
    public function getCivilite()
    {
        return $this->civilite;
    }

    /**
     * @param mixed $civilite
     */
    public function setCivilite($civilite): void
    {
        $this->civilite = $civilite;
    }


    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getSituationFamiliale()
    {
        return $this->situation_familiale;
    }

    /**
     * @param mixed $situation_familiale
     */
    public function setSituationFamiliale($situation_familiale): void
    {
        $this->situation_familiale = $situation_familiale;
    }

    /**
     * @return mixed
     */
    public function getUniversite()
    {
        return $this->universite;
    }

    /**
     * @param mixed $universite
     */
    public function setUniversite($universite): void
    {
        $this->universite = $universite;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre): void
    {
        $this->titre = $titre;
    }




    /**
     * @return mixed
     */
    public function getDiplome()
    {
        return $this->diplome;
    }

    /**
     * @param mixed $diplome
     */
    public function setDiplome($diplome): void
    {
        $this->diplome = $diplome;
    }

    /**
     * @return mixed
     */
    public function getSpecialite()
    {
        return $this->specialite;
    }

    /**
     * @param mixed $specialite
     */
    public function setSpecialite($specialite): void
    {
        $this->specialite = $specialite;
    }

    /**
     * @return mixed
     */
    public function getAnneeObtination()
    {
        return $this->annee_obtination;
    }

    /**
     * @param mixed $annee_obtination
     */
    public function setAnneeObtination($annee_obtination): void
    {
        $this->annee_obtination = $annee_obtination;
    }

    /**
     * @return mixed
     */
    public function getLangage()
    {
        return $this->langage;
    }

    /**
     * @param mixed $langage
     */
    public function setLangage($langage): void
    {
        $this->langage = $langage;
    }

    /**
     * @return mixed
     */
    public function getDateNaiss()
    {
        return $this->date_naiss;
    }

    /**
     * @param mixed $date_naiss
     */
    public function setDateNaiss($date_naiss): void
    {
        $this->date_naiss = $date_naiss;
    }

    /**
     * @return mixed
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * @param mixed $cin
     */
    public function setCin($cin): void
    {
        $this->cin = $cin;
    }

    /**
     * @return mixed
     */
    public function getDateCin()
    {
        return $this->date_cin;
    }

    /**
     * @param mixed $date_cin
     */
    public function setDateCin($date_cin): void
    {
        $this->date_cin = $date_cin;
    }


    /**
     * @return mixed
     */
    public function getNumCnss()
    {
        return $this->num_cnss;
    }

    /**
     * @param mixed $num_cnss
     */
    public function setNumCnss($num_cnss): void
    {
        $this->num_cnss = $num_cnss;
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
    public function getCodePostal()
    {
        return $this->code_postal;
    }

    /**
     * @param mixed $code_postal
     */
    public function setCodePostal($code_postal): void
    {
        $this->code_postal = $code_postal;
    }


    /**
     * @return mixed
     */
    public function getTel1()
    {
        return $this->tel1;
    }

    /**
     * @param mixed $tel1
     */
    public function setTel1($tel1): void
    {
        $this->tel1 = $tel1;
    }

    /**
     * @return mixed
     */
    public function getTel2()
    {
        return $this->tel2;
    }

    /**
     * @param mixed $tel2
     */
    public function setTel2($tel2): void
    {
        $this->tel2 = $tel2;
    }

    /**
     * @return mixed
     */
    public function getRib()
    {
        return $this->rib;
    }

    /**
     * @param mixed $rib
     */
    public function setRib($rib): void
    {
        $this->rib = $rib;
    }

    /**
     * @return mixed
     */
    public function getMailPro()
    {
        return $this->mail_pro;
    }

    /**
     * @param mixed $mail_pro
     */
    public function setMailPro($mail_pro): void
    {
        $this->mail_pro = $mail_pro;
    }

    /**
     * @return mixed
     */
    public function getNom1Urgence()
    {
        return $this->nom1_urgence;
    }

    /**
     * @param mixed $nom1_urgence
     */
    public function setNom1Urgence($nom1_urgence): void
    {
        $this->nom1_urgence = $nom1_urgence;
    }

    /**
     * @return mixed
     */
    public function getPrenom1Urgence()
    {
        return $this->prenom1_urgence;
    }

    /**
     * @param mixed $prenom1_urgence
     */
    public function setPrenom1Urgence($prenom1_urgence): void
    {
        $this->prenom1_urgence = $prenom1_urgence;
    }

    /**
     * @return mixed
     */
    public function getLien1()
    {
        return $this->lien1;
    }

    /**
     * @param mixed $lien1
     */
    public function setLien1($lien1): void
    {
        $this->lien1 = $lien1;
    }

    /**
     * @return mixed
     */
    public function getTelephone1()
    {
        return $this->telephone1;
    }

    /**
     * @param mixed $telephone1
     */
    public function setTelephone1($telephone1): void
    {
        $this->telephone1 = $telephone1;
    }

    /**
     * @return mixed
     */
    public function getNom2Urgence()
    {
        return $this->nom2_urgence;
    }

    /**
     * @param mixed $nom2_urgence
     */
    public function setNom2Urgence($nom2_urgence): void
    {
        $this->nom2_urgence = $nom2_urgence;
    }

    /**
     * @return mixed
     */
    public function getPrenom2Urgence()
    {
        return $this->prenom2_urgence;
    }

    /**
     * @param mixed $prenom2_urgence
     */
    public function setPrenom2Urgence($prenom2_urgence): void
    {
        $this->prenom2_urgence = $prenom2_urgence;
    }

    /**
     * @return mixed
     */
    public function getLien2()
    {
        return $this->lien2;
    }

    /**
     * @param mixed $lien2
     */
    public function setLien2($lien2): void
    {
        $this->lien2 = $lien2;
    }

    /**
     * @return mixed
     */
    public function getTelephone2()
    {
        return $this->telephone2;
    }

    /**
     * @param mixed $telephone2
     */
    public function setTelephone2($telephone2): void
    {
        $this->telephone2 = $telephone2;
    }


    public function getDateDeb(): ?\DateTimeInterface
    {
        return $this->date_deb;
    }

    public function setDateDeb(\DateTimeInterface $date_deb): self
    {
        $this->date_deb = $date_deb;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(\DateTimeInterface $date_fin): self
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPeriodeEssai()
    {
        return $this->periode_essai;
    }

    /**
     * @param mixed $periode_essai
     */
    public function setPeriodeEssai($periode_essai): void
    {
        $this->periode_essai = $periode_essai;
    }



    /**
     * @return mixed
     */
    public function getDateEmbauche()
    {
        return $this->date_embauche;
    }

    /**
     * @param mixed $date_embauche
     */
    public function setDateEmbauche($date_embauche): void
    {
        $this->date_embauche = $date_embauche;
    }

    /**
     * @return mixed
     */
    public function getDateDepart()
    {
        return $this->date_depart;
    }

    /**
     * @param mixed $date_depart
     */
    public function setDateDepart($date_depart): void
    {
        $this->date_depart = $date_depart;
    }

    public function getRaison(): ?string
    {
        return $this->raison;
    }

    public function setRaison(string $raison): self
    {
        $this->raison = $raison;

        return $this;
    }

    public function __toString()
    {
        return $this->getPrenom();
    }

    /**
     * Utilisateur constructor.
     * @param $password
     */
    public function __construct()
    {
        $this->password = generateRandomString();
        $this->matricule = numeroAL();
        $this->taches = new ArrayCollection();


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

    public function getEquipes(): ?equipe    {
        return $this->equipes;
    }

    public function setEquipes(?equipe $equipes): self
    {
        $this->equipes = $equipes;

        return $this;
    }

    /**
     * @return Collection|Tache[]
     */
    public function getTaches(): Collection
    {
        return $this->taches;
    }

    public function addTach(Tache $tach): self
    {
        if (!$this->taches->contains($tach)) {
            $this->taches[] = $tach;
            $tach->addRessource($this);
        }

        return $this;
    }

    public function removeTach(Tache $tach): self
    {
        if ($this->taches->contains($tach)) {
            $this->taches->removeElement($tach);
            $tach->removeRessource($this);
        }

        return $this;
    }

    public function getChefs(): ?Chef
    {
        return $this->chefs;
    }

    public function setChefs(?Chef $chefs): self
    {
        $this->chefs = $chefs;

        return $this;
    }




}






function generateRandomString($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function numeroAL($length = 4) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
