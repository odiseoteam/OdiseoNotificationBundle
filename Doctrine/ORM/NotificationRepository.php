<?php

namespace Odiseo\Bundle\NotificationBundle\Doctrine\ORM;

use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * NotificationRepository
 */
class NotificationRepository extends EntityRepository
{
    public function findByOwnerAndExceptTypeQuery(UserInterface $owner, $type, $limit = null)
    {
        /** @var QueryBuilder $queryBuilder */
        $queryBuilder = $this->getCollectionQueryBuilder();

        $queryBuilder
            ->andWhere($this->getAlias().'.owner = :owner')
            ->andWhere($queryBuilder->expr()->notIn($this->getAlias().'.type', array($type)))
            ->andWhere($this->getAlias().'.isRead = :isRead')
            ->setParameter('owner', $owner)
            ->setParameter('isRead', false)
        ;

        $this->applySorting($queryBuilder, array('createdAt' => 'DESC'));

        if (null !== $limit)
        {
            $queryBuilder->setMaxResults($limit);
        }

        return $queryBuilder->getQuery();
    }

    public function findByOwnerAndExceptType(UserInterface $owner, $type, $limit = null)
    {
        return $this->findByOwnerAndExceptTypeQuery($owner, $type, $limit)->getResult();
    }

    public function findByOwnerAndTypesQuery(UserInterface $owner, $types, $limit = null)
    {
        /** @var QueryBuilder $queryBuilder */
        $queryBuilder = $this->getCollectionQueryBuilder();

        $queryBuilder
            ->andWhere($this->getAlias().'.owner = :owner')
            ->andWhere($queryBuilder->expr()->in($this->getAlias().'.type', $types))
            ->andWhere($this->getAlias().'.isRead = :isRead')
            ->setParameter('owner', $owner)
            ->setParameter('isRead', false)
        ;

        $this->applySorting($queryBuilder, array('createdAt' => 'DESC'));

        if (null !== $limit)
        {
            $queryBuilder->setMaxResults($limit);
        }

        return $queryBuilder->getQuery();
    }

    public function findByOwnerAndTypes(UserInterface $owner, $types, $limit = null)
    {
        return $this->findByOwnerAndTypesQuery($owner, $types, $limit)->getResult();
    }

    public function markAsReadByOwnerAndExceptType(UserInterface $owner, $type)
    {
        /** @var QueryBuilder $queryBuilder */
        $queryBuilder = $this->getCollectionQueryBuilder();

        $queryBuilder
            ->update()
            ->andWhere($this->getAlias().'.owner = :owner')
            ->andWhere($queryBuilder->expr()->notIn($this->getAlias().'.type', array($type)))
            ->andWhere($this->getAlias().'.isRead = :isRead')
            ->setParameter('owner', $owner)
            ->setParameter('isRead', false)
            ->set($this->getAlias().'.isRead', true)
        ;

        return $queryBuilder->getQuery()->execute();
    }

    public function markAsReadByOwnerAndTypes(UserInterface $owner, $types)
    {
        /** @var QueryBuilder $queryBuilder */
        $queryBuilder = $this->getCollectionQueryBuilder();

        $queryBuilder
            ->update()
            ->andWhere($this->getAlias().'.owner = :owner')
            ->andWhere($queryBuilder->expr()->in($this->getAlias().'.type', $types))
            ->andWhere($this->getAlias().'.isRead = :isRead')
            ->setParameter('owner', $owner)
            ->setParameter('isRead', false)
            ->set($this->getAlias().'.isRead', true)
        ;

        return $queryBuilder->getQuery()->execute();
    }
}