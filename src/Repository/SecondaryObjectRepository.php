<?php

namespace App\Repository;

use App\Entity\SecondaryObject;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SecondaryObject>
 *
 * @method SecondaryObject|null find($id, $lockMode = null, $lockVersion = null)
 * @method SecondaryObject|null findOneBy(array $criteria, array $orderBy = null)
 * @method SecondaryObject[]    findAll()
 * @method SecondaryObject[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SecondaryObjectRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SecondaryObject::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(SecondaryObject $entity, bool $flush = true): void
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
    public function remove(SecondaryObject $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return SecondaryObject[] Returns an array of SecondaryObject objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SecondaryObject
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
