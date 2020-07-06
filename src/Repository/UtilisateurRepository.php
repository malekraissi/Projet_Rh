<?php

namespace App\Repository;

use App\Entity\Utilisateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;


/**
 * @method Utilisateur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Utilisateur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Utilisateur[]    findAll()
 * @method Utilisateur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UtilisateurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Utilisateur::class);
    }

public function findTitre():Array
{

$qb= $this->createQueryBuilder('u');
$qb->select('u.prenom' ,'u.nom')
    ->where('u.titre = :val')
    ->setParameter('val' , 'directeur');
    $query = $qb->getQuery();

    return $query->execute();
}



    public function findEmailChef():Array
    {

        $qb= $this->createQueryBuilder('u');
        $qb->where('u.titre = :val')
            ->setParameter('val' , 'chef');
        $query = $qb->getQuery();

        return $query->execute();
    }


















}

