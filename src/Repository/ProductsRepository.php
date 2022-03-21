<?php

namespace App\Repository;

use App\Classe\Search;
use App\Entity\Products;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Products|null find($id, $lockMode = null, $lockVersion = null)
 * @method Products|null findOneBy(array $criteria, array $orderBy = null)
 * @method Products[]    findAll()
 * @method Products[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Products::class);
    }

   /**
    * requete qui permet de recupere les produits en fonction de la recherche de l'utilisateur
    * @return Products[]
    */
    public function findSearch($search)
    {
        $query = $this
             ->createQueryBuilder('p')
             ->setParameter('surfacemin', $search['surfacemin'])
             ->setParameter('surfacemax', $search['surfacemax'])
             ->setParameter('piecemin', $search['piecemin']) 
             ->setParameter('piecemax', $search['piecemax'])
             ->setParameter('prixmin', $search['prixmin'])
             ->setParameter('prixmax', $search['prixmax'])
             ->andWhere('p.surface >= :surfacemin')
             ->andWhere('p.surface <= :surfacemax')
             ->andWhere('p.floor >= :piecemin')
             ->andWhere('p.floor <= :piecemax')
             ->andWhere('p.price >= :prixmin')
             ->andWhere('p.price <= :prixmax');
           
        
            return $query->getQuery()->getResult();

    }

    // /**
    //  * @return Products[] Returns an array of Products objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Products
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

}