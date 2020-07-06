<?php

namespace App\Repository;

use App\Entity\Assirance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Assirance|null find($id, $lockMode = null, $lockVersion = null)
 * @method Assirance|null findOneBy(array $criteria, array $orderBy = null)
 * @method Assirance[]    findAll()
 * @method Assirance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AssiranceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Assirance::class);
    }

    // /**
    //  * @return Assirance[] Returns an array of Assirance objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Assirance
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
