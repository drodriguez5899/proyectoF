<?php

namespace App\Repository;

use App\Entity\FestivalOtro;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FestivalOtro|null find($id, $lockMode = null, $lockVersion = null)
 * @method FestivalOtro|null findOneBy(array $criteria, array $orderBy = null)
 * @method FestivalOtro[]    findAll()
 * @method FestivalOtro[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FestivalOtroRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FestivalOtro::class);
    }

    // /**
    //  * @return FestivalOtro[] Returns an array of FestivalOtro objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FestivalOtro
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
