<?php

namespace App\Repository;

use App\Entity\ProfilChromosomesEtGenes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProfilChromosomesEtGenes>
 *
 * @method ProfilChromosomesEtGenes|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProfilChromosomesEtGenes|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProfilChromosomesEtGenes[]    findAll()
 * @method ProfilChromosomesEtGenes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfilChromosomesEtGenesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProfilChromosomesEtGenes::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ProfilChromosomesEtGenes $entity, bool $flush = true): void
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
    public function remove(ProfilChromosomesEtGenes $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ProfilChromosomesEtGenes[] Returns an array of ProfilChromosomesEtGenes objects
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
    public function findOneBySomeField($value): ?ProfilChromosomesEtGenes
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
