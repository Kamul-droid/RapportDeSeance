<?php

namespace App\Repository;

use App\Entity\BalanceHormonaleMale;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BalanceHormonaleMale>
 *
 * @method BalanceHormonaleMale|null find($id, $lockMode = null, $lockVersion = null)
 * @method BalanceHormonaleMale|null findOneBy(array $criteria, array $orderBy = null)
 * @method BalanceHormonaleMale[]    findAll()
 * @method BalanceHormonaleMale[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BalanceHormonaleMaleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BalanceHormonaleMale::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(BalanceHormonaleMale $entity, bool $flush = true): void
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
    public function remove(BalanceHormonaleMale $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return BalanceHormonaleMale[] Returns an array of BalanceHormonaleMale objects
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
    public function findOneBySomeField($value): ?BalanceHormonaleMale
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
