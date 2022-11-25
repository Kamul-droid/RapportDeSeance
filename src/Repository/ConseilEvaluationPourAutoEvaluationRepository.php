<?php

namespace App\Repository;

use App\Entity\ConseilEvaluationPourAutoEvaluation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ConseilEvaluationPourAutoEvaluation>
 *
 * @method ConseilEvaluationPourAutoEvaluation|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConseilEvaluationPourAutoEvaluation|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConseilEvaluationPourAutoEvaluation[]    findAll()
 * @method ConseilEvaluationPourAutoEvaluation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConseilEvaluationPourAutoEvaluationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConseilEvaluationPourAutoEvaluation::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ConseilEvaluationPourAutoEvaluation $entity, bool $flush = true): void
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
    public function remove(ConseilEvaluationPourAutoEvaluation $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ConseilEvaluationPourAutoEvaluation[] Returns an array of ConseilEvaluationPourAutoEvaluation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ConseilEvaluationPourAutoEvaluation
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
