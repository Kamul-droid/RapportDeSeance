<?php

namespace App\Repository;

use App\Entity\AcuQuan;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AcuQuan>
 *
 * @method AcuQuan|null find($id, $lockMode = null, $lockVersion = null)
 * @method AcuQuan|null findOneBy(array $criteria, array $orderBy = null)
 * @method AcuQuan[]    findAll()
 * @method AcuQuan[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AcuQuanRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AcuQuan::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(AcuQuan $entity, bool $flush = true): void
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
    public function remove(AcuQuan $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return AcuQuan[] Returns an array of AcuQuan objects
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
    public function findOneBySomeField($value): ?AcuQuan
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
