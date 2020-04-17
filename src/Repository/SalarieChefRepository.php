<?php

namespace App\Repository;

use App\Entity\SalarieChef;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method SalarieChef|null find($id, $lockMode = null, $lockVersion = null)
 * @method SalarieChef|null findOneBy(array $criteria, array $orderBy = null)
 * @method SalarieChef[]    findAll()
 * @method SalarieChef[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SalarieChefRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SalarieChef::class);
    }

    // /**
    //  * @return SalarieChef[] Returns an array of SalarieChef objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SalarieChef
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
