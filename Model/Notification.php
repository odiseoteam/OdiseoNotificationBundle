<?php

namespace Odiseo\Bundle\NotificationBundle\Model;

use Symfony\Component\Security\Core\User\UserInterface;

class Notification implements NotificationInterface
{
    protected $id;
    protected $owner;
    protected $message;
    protected $link;
    protected $type;
    protected $isRead;
    protected $createdAt;

    public function __construct()
    {
        $this->type = NotificationInterface::TYPE_INFO;
        $this->isRead = false;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setOwner(UserInterface $owner)
    {
        $this->owner = $owner;
    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setLink($link)
    {
        $this->link = $link;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setIsRead($isRead)
    {
        if (!is_bool($isRead)) {
            throw new \Exception(sprintf('Notification read state must be set to a boolean, %s given.', gettype($isRead)));
        }

        $this->isRead = $isRead;
    }

    public function isRead()
    {
        return $this->isRead;
    }

    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}