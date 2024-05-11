<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

/**
 * @extends ServiceEntityRepository<User>
 *
 * @implements PasswordUpgraderInterface<User>
 *
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof User) {
            //throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', $user::class));
        }

        $user->setPassword($newHashedPassword);
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();
    }

//    /**
//     * @return User[] Returns an array of User objects
//     */

    
public function findCompatibleUsers(User $user): array
{
    // Récupérer les informations du User actuel
    $currentUserSkills = $user->getSkills();
    $currentUserPosition = $user->getPosition();
    $currentUserExperience = $user->getExperience();

    // Récupérer le repository EntityManager pour accéder aux autres utilisateurs
    $em = $this->getEntityManager();

    // Construire la requête pour trouver les utilisateurs compatibles
    $qb = $em->createQueryBuilder();
    $qb->select('u')
       ->from('App\Entity\User', 'u')
       ->where($qb->expr()->not('u.id = :currentUserId'))
       ->setParameter('currentUserId', $user->getId());

    // Filtrer par compétences similaires
    $qb->andWhere($qb->expr()->in('u.skills', $currentUserSkills));

    // Filtrer par titre de poste similaire
    $qb->andWhere($qb->expr()->eq('u.position', ':currentUserPosition'))
       ->setParameter('currentUserPosition', $currentUserPosition);

    // Filtrer par expérience similaire (vous pouvez ajuster la logique selon vos besoins)
    $qb->andWhere($qb->expr()->between('u.experience', $currentUserExperience - 2, $currentUserExperience + 2));

    // Exécuter la requête
    $query = $qb->getQuery();
    $compatibleUsers = $query->getResult();

    return $compatibleUsers;
}


//    public function findOneBySomeField($value): ?User
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
