<?php

namespace App\Repository;

use App\Entity\ProfilAcuMeridien;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProfilAcuMeridien>
 *
 * @method ProfilAcuMeridien|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProfilAcuMeridien|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProfilAcuMeridien[]    findAll()
 * @method ProfilAcuMeridien[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfilAcuMeridienRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProfilAcuMeridien::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ProfilAcuMeridien $entity, bool $flush = true): void
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
    public function persist(ProfilAcuMeridien $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);

    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(ProfilAcuMeridien $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ProfilAcuMeridien[] Returns an array of ProfilAcuMeridien objects
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
    public function findOneBySomeField($value): ?ProfilAcuMeridien
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
