<?php

namespace Odiseo\Bundle\NotificationBundle\Event;

use Odiseo\Bundle\NotificationBundle\Model\NotificationInterface;
use Symfony\Component\EventDispatcher\Event;

class NotificationEvent extends Event
{
    /**
     * The notification
     *
     * @var NotificationInterface
     */
    private $notification;

    public function __construct(NotificationInterface $notification)
    {
        $this->notification = $notification;
    }

    /**
     * Returns the notification
     *
     * @return NotificationInterface
     */
    public function getNotification()
    {
        return $this->notification;
    }
}
