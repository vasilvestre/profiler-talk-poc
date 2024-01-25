<?php

namespace App\Repository;

use App\Entity\InsertedObject;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<InsertedObject>
 *
 * @method InsertedObject|null find($id, $lockMode = null, $lockVersion = null)
 * @method InsertedObject|null findOneBy(array $criteria, array $orderBy = null)
 * @method InsertedObject[]    findAll()
 * @method InsertedObject[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InsertedObjectRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InsertedObject::class);
    }

//    /**
//     * @return InsertedObject[] Returns an array of InsertedObject objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?InsertedObject
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
