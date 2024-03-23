<?php

namespace App\Repository;

use App\Entity\MentorSession;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MentorSession>
 *
 * @method MentorSession|null find($id, $lockMode = null, $lockVersion = null)
 * @method MentorSession|null findOneBy(array $criteria, array $orderBy = null)
 * @method MentorSession[]    findAll()
 * @method MentorSession[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MentorSessionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MentorSession::class);
    }

//    /**
//     * @return MentorSession[] Returns an array of MentorSession objects
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

//    public function findOneBySomeField($value): ?MentorSession
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
