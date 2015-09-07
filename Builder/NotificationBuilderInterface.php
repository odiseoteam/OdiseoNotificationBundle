<?php

namespace Odiseo\Bundle\NotificationBundle\Builder;

use Odiseo\Bundle\NotificationBundle\Model\NotificationInterface;
use Odiseo\Bundle\UserBundle\Model\UserInterface;

interface NotificationBuilderInterface
{
    /**
     * Build the notification of user.
     *
     * @param string $message
     * @param UserInterface $owner
     * @param string $type
     */
    public function build($message, UserInterface $owner = null, $type = NotificationInterface::TYPE_INFO);
}
