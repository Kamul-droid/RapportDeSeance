<?php

namespace App\Repository;

use App\Entity\FacteursDeStressConflictuel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FacteursDeStressConflictuel>
 *
 * @method FacteursDeStressConflictuel|null find($id, $lockMode = null, $lockVersion = null)
 * @method FacteursDeStressConflictuel|null findOneBy(array $criteria, array $orderBy = null)
 * @method FacteursDeStressConflictuel[]    findAll()
 * @method FacteursDeStressConflictuel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FacteursDeStressConflictuelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FacteursDeStressConflictuel::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(FacteursDeStressConflictuel $entity, bool $flush = true): void
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
    public function remove(FacteursDeStressConflictuel $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return FacteursDeStressConflictuel[] Returns an array of FacteursDeStressConflictuel objects
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
    public function findOneBySomeField($value): ?FacteursDeStressConflictuel
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
