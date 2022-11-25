<?php

namespace App\Repository;

use App\Entity\BalanceHormonaleFemelle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BalanceHormonaleFemelle>
 *
 * @method BalanceHormonaleFemelle|null find($id, $lockMode = null, $lockVersion = null)
 * @method BalanceHormonaleFemelle|null findOneBy(array $criteria, array $orderBy = null)
 * @method BalanceHormonaleFemelle[]    findAll()
 * @method BalanceHormonaleFemelle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BalanceHormonaleFemelleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BalanceHormonaleFemelle::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(BalanceHormonaleFemelle $entity, bool $flush = true): void
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
    public function remove(BalanceHormonaleFemelle $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return BalanceHormonaleFemelle[] Returns an array of BalanceHormonaleFemelle objects
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
    public function findOneBySomeField($value): ?BalanceHormonaleFemelle
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
