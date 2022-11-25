<?php

namespace App\Repository;

use App\Entity\EquilibreHarmoniqueCerveauGaucheCerveauDroit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EquilibreHarmoniqueCerveauGaucheCerveauDroit>
 *
 * @method EquilibreHarmoniqueCerveauGaucheCerveauDroit|null find($id, $lockMode = null, $lockVersion = null)
 * @method EquilibreHarmoniqueCerveauGaucheCerveauDroit|null findOneBy(array $criteria, array $orderBy = null)
 * @method EquilibreHarmoniqueCerveauGaucheCerveauDroit[]    findAll()
 * @method EquilibreHarmoniqueCerveauGaucheCerveauDroit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EquilibreHarmoniqueCerveauGaucheCerveauDroitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EquilibreHarmoniqueCerveauGaucheCerveauDroit::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(EquilibreHarmoniqueCerveauGaucheCerveauDroit $entity, bool $flush = true): void
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
    public function remove(EquilibreHarmoniqueCerveauGaucheCerveauDroit $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return EquilibreHarmoniqueCerveauGaucheCerveauDroit[] Returns an array of EquilibreHarmoniqueCerveauGaucheCerveauDroit objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EquilibreHarmoniqueCerveauGaucheCerveauDroit
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
