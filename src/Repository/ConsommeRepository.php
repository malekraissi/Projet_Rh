<?php

namespace App\Repository;

use App\Entity\Consomme;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Consomme|null find($id, $lockMode = null, $lockVersion = null)
 * @method Consomme|null findOneBy(array $criteria, array $orderBy = null)
 * @method Consomme[]    findAll()
 * @method Consomme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConsommeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Consomme::class);
    }

    // /**
    //  * @return Consomme[] Returns an array of Consomme objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Consomme
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
