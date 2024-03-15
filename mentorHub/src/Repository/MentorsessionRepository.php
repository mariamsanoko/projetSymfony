<?php

namespace App\Repository;

use App\Entity\Mentorsession;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Mentorsession>
 *
 * @method Mentorsession|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mentorsession|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mentorsession[]    findAll()
 * @method Mentorsession[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MentorsessionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Mentorsession::class);
    }

//    /**
//     * @return Mentorsession[] Returns an array of Mentorsession objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Mentorsession
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
