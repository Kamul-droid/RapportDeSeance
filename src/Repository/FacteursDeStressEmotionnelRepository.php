<?php

namespace App\Repository;

use App\Entity\FacteursDeStressEmotionnel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FacteursDeStressEmotionnel>
 *
 * @method FacteursDeStressEmotionnel|null find($id, $lockMode = null, $lockVersion = null)
 * @method FacteursDeStressEmotionnel|null findOneBy(array $criteria, array $orderBy = null)
 * @method FacteursDeStressEmotionnel[]    findAll()
 * @method FacteursDeStressEmotionnel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FacteursDeStressEmotionnelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FacteursDeStressEmotionnel::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(FacteursDeStressEmotionnel $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(FacteursDeStressEmotionnel $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return FacteursDeStressEmotionnel[] Returns an array of FacteursDeStressEmotionnel objects
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
    public function findOneBySomeField($value): ?FacteursDeStressEmotionnel
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
