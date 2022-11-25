<?php

namespace App\Repository;

use App\Entity\ReglageOndesCerebrales;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ReglageOndesCerebrales>
 *
 * @method ReglageOndesCerebrales|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReglageOndesCerebrales|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReglageOndesCerebrales[]    findAll()
 * @method ReglageOndesCerebrales[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReglageOndesCerebralesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReglageOndesCerebrales::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ReglageOndesCerebrales $entity, bool $flush = true): void
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
    public function remove(ReglageOndesCerebrales $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ReglageOndesCerebrales[] Returns an array of ReglageOndesCerebrales objects
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
    public function findOneBySomeField($value): ?ReglageOndesCerebrales
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
