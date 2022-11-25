<?php

namespace App\Repository;

use App\Entity\FacteursDeStressPersonnelEtAutoInduit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FacteursDeStressPersonnelEtAutoInduit>
 *
 * @method FacteursDeStressPersonnelEtAutoInduit|null find($id, $lockMode = null, $lockVersion = null)
 * @method FacteursDeStressPersonnelEtAutoInduit|null findOneBy(array $criteria, array $orderBy = null)
 * @method FacteursDeStressPersonnelEtAutoInduit[]    findAll()
 * @method FacteursDeStressPersonnelEtAutoInduit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FacteursDeStressPersonnelEtAutoInduitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FacteursDeStressPersonnelEtAutoInduit::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(FacteursDeStressPersonnelEtAutoInduit $entity, bool $flush = true): void
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
    public function remove(FacteursDeStressPersonnelEtAutoInduit $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return FacteursDeStressPersonnelEtAutoInduit[] Returns an array of FacteursDeStressPersonnelEtAutoInduit objects
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
    public function findOneBySomeField($value): ?FacteursDeStressPersonnelEtAutoInduit
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
