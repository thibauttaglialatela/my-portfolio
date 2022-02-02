<?php

namespace App\Repository;

use App\Entity\PersonnalContent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PersonnalContent|null find($id, $lockMode = null, $lockVersion = null)
 * @method PersonnalContent|null findOneBy(array $criteria, array $orderBy = null)
 * @method PersonnalContent[]    findAll()
 * @method PersonnalContent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonnalContentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PersonnalContent::class);
    }

    // /**
    //  * @return PersonnalContent[] Returns an array of PersonnalContent objects
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
    public function findOneBySomeField($value): ?PersonnalContent
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
