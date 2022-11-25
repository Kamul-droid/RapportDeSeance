<?php

namespace App\Repository;

use App\Entity\RegistreDeSusceptibilite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RegistreDeSusceptibilite>
 *
 * @method RegistreDeSusceptibilite|null find($id, $lockMode = null, $lockVersion = null)
 * @method RegistreDeSusceptibilite|null findOneBy(array $criteria, array $orderBy = null)
 * @method RegistreDeSusceptibilite[]    findAll()
 * @method RegistreDeSusceptibilite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RegistreDeSusceptibiliteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RegistreDeSusceptibilite::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(RegistreDeSusceptibilite $entity, bool $flush = true): void
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
    public function remove(RegistreDeSusceptibilite $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return RegistreDeSusceptibilite[] Returns an array of RegistreDeSusceptibilite objects
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
    public function findOneBySomeField($value): ?RegistreDeSusceptibilite
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
