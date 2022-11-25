<?php

namespace App\Repository;

use App\Entity\ToxinesEnvironnementalesEtIndustrielles;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ToxinesEnvironnementalesEtIndustrielles>
 *
 * @method ToxinesEnvironnementalesEtIndustrielles|null find($id, $lockMode = null, $lockVersion = null)
 * @method ToxinesEnvironnementalesEtIndustrielles|null findOneBy(array $criteria, array $orderBy = null)
 * @method ToxinesEnvironnementalesEtIndustrielles[]    findAll()
 * @method ToxinesEnvironnementalesEtIndustrielles[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ToxinesEnvironnementalesEtIndustriellesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ToxinesEnvironnementalesEtIndustrielles::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ToxinesEnvironnementalesEtIndustrielles $entity, bool $flush = true): void
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
    public function remove(ToxinesEnvironnementalesEtIndustrielles $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ToxinesEnvironnementalesEtIndustrielles[] Returns an array of ToxinesEnvironnementalesEtIndustrielles objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ToxinesEnvironnementalesEtIndustrielles
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
