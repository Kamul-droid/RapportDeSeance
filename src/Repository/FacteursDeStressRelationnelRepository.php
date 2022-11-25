<?php

namespace App\Repository;

use App\Entity\FacteursDeStressRelationnel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FacteursDeStressRelationnel>
 *
 * @method FacteursDeStressRelationnel|null find($id, $lockMode = null, $lockVersion = null)
 * @method FacteursDeStressRelationnel|null findOneBy(array $criteria, array $orderBy = null)
 * @method FacteursDeStressRelationnel[]    findAll()
 * @method FacteursDeStressRelationnel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FacteursDeStressRelationnelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FacteursDeStressRelationnel::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(FacteursDeStressRelationnel $entity, bool $flush = true): void
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
    public function remove(FacteursDeStressRelationnel $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return FacteursDeStressRelationnel[] Returns an array of FacteursDeStressRelationnel objects
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
    public function findOneBySomeField($value): ?FacteursDeStressRelationnel
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
