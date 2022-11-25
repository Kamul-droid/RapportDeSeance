<?php

namespace App\Repository;

use App\Entity\DetoxDuCorps;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DetoxDuCorps>
 *
 * @method DetoxDuCorps|null find($id, $lockMode = null, $lockVersion = null)
 * @method DetoxDuCorps|null findOneBy(array $criteria, array $orderBy = null)
 * @method DetoxDuCorps[]    findAll()
 * @method DetoxDuCorps[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DetoxDuCorpsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DetoxDuCorps::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(DetoxDuCorps $entity, bool $flush = true): void
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
    public function remove(DetoxDuCorps $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return DetoxDuCorps[] Returns an array of DetoxDuCorps objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DetoxDuCorps
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
