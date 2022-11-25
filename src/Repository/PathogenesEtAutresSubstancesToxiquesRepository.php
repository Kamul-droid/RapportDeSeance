<?php

namespace App\Repository;

use App\Entity\PathogenesEtAutresSubstancesToxiques;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PathogenesEtAutresSubstancesToxiques>
 *
 * @method PathogenesEtAutresSubstancesToxiques|null find($id, $lockMode = null, $lockVersion = null)
 * @method PathogenesEtAutresSubstancesToxiques|null findOneBy(array $criteria, array $orderBy = null)
 * @method PathogenesEtAutresSubstancesToxiques[]    findAll()
 * @method PathogenesEtAutresSubstancesToxiques[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PathogenesEtAutresSubstancesToxiquesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PathogenesEtAutresSubstancesToxiques::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(PathogenesEtAutresSubstancesToxiques $entity, bool $flush = true): void
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
    public function remove(PathogenesEtAutresSubstancesToxiques $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return PathogenesEtAutresSubstancesToxiques[] Returns an array of PathogenesEtAutresSubstancesToxiques objects
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
    public function findOneBySomeField($value): ?PathogenesEtAutresSubstancesToxiques
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
