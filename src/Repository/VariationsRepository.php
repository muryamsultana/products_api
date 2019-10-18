<?php

namespace App\Repository;

use App\Entity\Variations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Variations|null find($id, $lockMode = null, $lockVersion = null)
 * @method Variations|null findOneBy(array $criteria, array $orderBy = null)
 * @method Variations[]    findAll()
 * @method Variations[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VariationsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Variations::class);
    }

    // /**
    //  * @return Variations[] Returns an array of Variations objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Variations
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
