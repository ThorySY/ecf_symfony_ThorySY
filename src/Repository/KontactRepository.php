<?php

namespace App\Repository;

use App\Entity\Kontact;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Kontact|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kontact|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kontact[]    findAll()
 * @method Kontact[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KontactRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Kontact::class);
    }

    // /**
    //  * @return Kontact[] Returns an array of Kontact objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Kontact
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
