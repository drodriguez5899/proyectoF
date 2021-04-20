<?php

namespace App\Repository;

use App\Entity\FestivalDestacado;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FestivalDestacado|null find($id, $lockMode = null, $lockVersion = null)
 * @method FestivalDestacado|null findOneBy(array $criteria, array $orderBy = null)
 * @method FestivalDestacado[]    findAll()
 * @method FestivalDestacado[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FestivalDestacadoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FestivalDestacado::class);
    }

    // /**
    //  * @return FestivalDestacado[] Returns an array of FestivalDestacado objects
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
    public function findOneBySomeField($value): ?FestivalDestacado
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
