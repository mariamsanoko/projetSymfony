<?php

namespace App\Repository;

use App\Entity\Mentorsesssion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Mentorsesssion>
 *
 * @method Mentorsesssion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mentorsesssion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mentorsesssion[]    findAll()
 * @method Mentorsesssion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MentorsesssionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Mentorsesssion::class);
    }

//    /**
//     * @return Mentorsesssion[] Returns an array of Mentorsesssion objects
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

//    public function findOneBySomeField($value): ?Mentorsesssion
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
