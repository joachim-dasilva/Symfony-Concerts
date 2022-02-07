<?php

namespace App\Repository;

use App\Entity\Concert;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Concert|null find($id, $lockMode = null, $lockVersion = null)
 * @method Concert|null findOneBy(array $criteria, array $orderBy = null)
 * @method Concert[]    findAll()
 * @method Concert[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConcertRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Concert::class);
    }

    /**
     * @return Concert[] Returns an array of Concert objects where dateEnd > NOW()
     */
    public function findAllFuture()
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.dateEnd > :now')
            ->setParameter('now', new DateTime())
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Concert[] Returns an array of Concert objects where dateEnd < NOW()
     */
    public function findAllPast()
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.dateEnd < :now')
            ->setParameter('now', new DateTime())
            ->getQuery()
            ->getResult();
    }

        /**
     * @param id band's id
     * @return Concert[] Returns an array of Concert objects where dateEnd > NOW()
     */
    public function findAllFutureByBand(int $id)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.dateEnd > :now')
            ->andWhere('c.band = :band')
            ->setParameter('now', new DateTime())
            ->setParameter('band', $id)
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return Concert[] Returns an array of Concert objects
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
    public function findOneBySomeField($value): ?Concert
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
