<?php

namespace App\Repository;

use App\Entity\Chef;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Chef|null find($id, $lockMode = null, $lockVersion = null)
 * @method Chef|null findOneBy(array $criteria, array $orderBy = null)
 * @method Chef[]    findAll()
 * @method Chef[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChefRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Chef::class);
    }

    public function findChef():Array
    {

        $qb= $this->createQueryBuilder('c');
        $qb->select('c.prenom' ,'c.nom');
        $query = $qb->getQuery();

        return $query->execute();
    }
}
