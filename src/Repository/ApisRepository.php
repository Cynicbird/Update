<?php

namespace App\Repository;

use App\Entity\Apis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Apis|null find($id, $lockMode = null, $lockVersion = null)
 * @method Apis|null findOneBy(array $criteria, array $orderBy = null)
 * @method Apis[]    findAll()
 * @method Apis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApisRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Apis::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('a')
            ->where('a.something = :value')->setParameter('value', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
