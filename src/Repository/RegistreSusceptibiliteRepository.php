<?php

namespace App\Repository;

use App\Entity\ProfilRegistreSusceptibilite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProfilRegistreSusceptibilite>
 *
 * @method ProfilRegistreSusceptibilite|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProfilRegistreSusceptibilite|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProfilRegistreSusceptibilite[]    findAll()
 * @method ProfilRegistreSusceptibilite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RegistreSusceptibiliteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProfilRegistreSusceptibilite::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ProfilRegistreSusceptibilite $entity, bool $flush = true): void
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
    public function remove(ProfilRegistreSusceptibilite $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ProfilRegistreSusceptibilite[] Returns an array of ProfilRegistreSusceptibilite objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ProfilRegistreSusceptibilite
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
