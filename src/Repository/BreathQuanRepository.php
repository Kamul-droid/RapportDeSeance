<?php

namespace App\Repository;

use App\Entity\BreathQuan;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BreathQuan>
 *
 * @method BreathQuan|null find($id, $lockMode = null, $lockVersion = null)
 * @method BreathQuan|null findOneBy(array $criteria, array $orderBy = null)
 * @method BreathQuan[]    findAll()
 * @method BreathQuan[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BreathQuanRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BreathQuan::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(BreathQuan $entity, bool $flush = true): void
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
    public function remove(BreathQuan $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return BreathQuan[] Returns an array of BreathQuan objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BreathQuan
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
