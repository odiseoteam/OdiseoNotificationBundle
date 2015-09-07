<?php

namespace Odiseo\Bundle\NotificationBundle\Builder;

use Doctrine\Common\Persistence\ObjectManager;
use Odiseo\Bundle\NotificationBundle\Model\Notification;
use Odiseo\Bundle\NotificationBundle\Model\NotificationInterface;
use Odiseo\Bundle\UserBundle\Model\UserInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

class NotificationBuilder implements NotificationBuilderInterface
{
    /**
     * Attribute value repository.
     *
     * @var RepositoryInterface
     */
    protected $notificationRepository;

    /**
     * @var ObjectManager
     */
    protected $notificationManager;

    /**
     * @var TokenStorage
     */
    protected $tokenStorage;

    /**
     * Constructor.
     *
     * @param RepositoryInterface $notificationRepository
     * @param ObjectManager $notificationManager
     * @param TokenStorage $tokenStorage
     */
    public function __construct(RepositoryInterface $notificationRepository, ObjectManager $notificationManager, TokenStorage $tokenStorage)
    {
        $this->notificationRepository = $notificationRepository;
        $this->notificationManager = $notificationManager;
        $this->tokenStorage = $tokenStorage;
    }

    /**
     * {@inheritdoc}
     */
    public function build($message, UserInterface $owner = null, $link = null, $type = NotificationInterface::TYPE_INFO)
    {
        if (null === $owner) {
            $owner = $this->tokenStorage->getToken()->getUser();
        }

        /** @var Notification $notification */
        $notification = $this->notificationRepository->createNew();
        $notification->setOwner($owner);
        $notification->setMessage($message);
        $notification->setLink($link);
        $notification->setType($type);

        $this->notificationManager->persist($notification);
        $this->notificationManager->flush();
    }
}
