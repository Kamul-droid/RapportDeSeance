<?php

namespace App\Repository;

use App\Entity\FacteursGeneraux;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FacteursGeneraux>
 *
 * @method FacteursGeneraux|null find($id, $lockMode = null, $lockVersion = null)
 * @method FacteursGeneraux|null findOneBy(array $criteria, array $orderBy = null)
 * @method FacteursGeneraux[]    findAll()
 * @method FacteursGeneraux[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FacteursGenerauxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FacteursGeneraux::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(FacteursGeneraux $entity, bool $flush = true): void
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
    public function remove(FacteursGeneraux $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return FacteursGeneraux[] Returns an array of FacteursGeneraux objects
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
    public function findOneBySomeField($value): ?FacteursGeneraux
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
