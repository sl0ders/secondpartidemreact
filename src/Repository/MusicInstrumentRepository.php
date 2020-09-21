<?php

namespace App\Repository;

use App\Entity\MusicInstrument;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MusicInstrument|null find($id, $lockMode = null, $lockVersion = null)
 * @method MusicInstrument|null findOneBy(array $criteria, array $orderBy = null)
 * @method MusicInstrument[]    findAll()
 * @method MusicInstrument[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MusicInstrumentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MusicInstrument::class);
    }

    // /**
    //  * @return MusicInstrument[] Returns an array of MusicInstrument objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MusicInstrument
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
