<?php

namespace App\Repository;

use App\Entity\DigestifQuan;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DigestifQuan>
 *
 * @method DigestifQuan|null find($id, $lockMode = null, $lockVersion = null)
 * @method DigestifQuan|null findOneBy(array $criteria, array $orderBy = null)
 * @method DigestifQuan[]    findAll()
 * @method DigestifQuan[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DigestifQuanRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DigestifQuan::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(DigestifQuan $entity, bool $flush = true): void
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
    public function remove(DigestifQuan $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return DigestifQuan[] Returns an array of DigestifQuan objects
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
    public function findOneBySomeField($value): ?DigestifQuan
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
