<?php

namespace App\Repository;

use App\Entity\ProfilRegistreAutoProgramme;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProfilRegistreAutoProgramme>
 *
 * @method ProfilRegistreAutoProgramme|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProfilRegistreAutoProgramme|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProfilRegistreAutoProgramme[]    findAll()
 * @method ProfilRegistreAutoProgramme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfilRegistreAutoProgrammeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProfilRegistreAutoProgramme::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ProfilRegistreAutoProgramme $entity, bool $flush = true): void
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
    public function remove(ProfilRegistreAutoProgramme $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ProfilRegistreAutoProgramme[] Returns an array of ProfilRegistreAutoProgramme objects
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
    public function findOneBySomeField($value): ?ProfilRegistreAutoProgramme
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
