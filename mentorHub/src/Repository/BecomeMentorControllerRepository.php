<?php

namespace App\Repository;

use App\Entity\BecomeMentorController;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BecomeMentorController>
 *
 * @method BecomeMentorController|null find($id, $lockMode = null, $lockVersion = null)
 * @method BecomeMentorController|null findOneBy(array $criteria, array $orderBy = null)
 * @method BecomeMentorController[]    findAll()
 * @method BecomeMentorController[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BecomeMentorControllerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BecomeMentorController::class);
    }

//    /**
//     * @return BecomeMentorController[] Returns an array of BecomeMentorController objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?BecomeMentorController
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
