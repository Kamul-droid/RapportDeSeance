<?php

namespace App\Repository;

use App\Entity\ProfilDetoxEtStressMultiples;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProfilDetoxEtStressMultiples>
 *
 * @method ProfilDetoxEtStressMultiples|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProfilDetoxEtStressMultiples|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProfilDetoxEtStressMultiples[]    findAll()
 * @method ProfilDetoxEtStressMultiples[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfilDetoxEtStressMultiplesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProfilDetoxEtStressMultiples::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ProfilDetoxEtStressMultiples $entity, bool $flush = true): void
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
    public function remove(ProfilDetoxEtStressMultiples $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ProfilDetoxEtStressMultiples[] Returns an array of ProfilDetoxEtStressMultiples objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ProfilDetoxEtStressMultiples
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
