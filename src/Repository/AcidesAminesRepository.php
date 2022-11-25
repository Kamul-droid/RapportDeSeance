<?php

namespace App\Repository;

use App\Entity\AcidesAmines;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AcidesAmines>
 *
 * @method AcidesAmines|null find($id, $lockMode = null, $lockVersion = null)
 * @method AcidesAmines|null findOneBy(array $criteria, array $orderBy = null)
 * @method AcidesAmines[]    findAll()
 * @method AcidesAmines[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AcidesAminesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AcidesAmines::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(AcidesAmines $entity, bool $flush = true): void
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
    public function remove(AcidesAmines $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return AcidesAmines[] Returns an array of AcidesAmines objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AcidesAmines
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
