<?php

namespace App\Repository;

use App\Entity\ProfilNeuroEmotionnel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProfilNeuroEmotionnel>
 *
 * @method ProfilNeuroEmotionnel|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProfilNeuroEmotionnel|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProfilNeuroEmotionnel[]    findAll()
 * @method ProfilNeuroEmotionnel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfilNeuroEmotionnelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProfilNeuroEmotionnel::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ProfilNeuroEmotionnel $entity, bool $flush = true): void
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
    public function remove(ProfilNeuroEmotionnel $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ProfilNeuroEmotionnel[] Returns an array of ProfilNeuroEmotionnel objects
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
    public function findOneBySomeField($value): ?ProfilNeuroEmotionnel
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
