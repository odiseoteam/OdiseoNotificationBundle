<?php
/**
 * Created by PhpStorm.
 * User: gecko
 * Date: 26/08/15
 * Time: 02:00
 */
namespace Odiseo\Bundle\NotificationBundle\Model;

use Symfony\Component\Security\Core\User\UserInterface;

interface NotificationInterface
{
    // Notification types.
    const TYPE_INFO        = 'info';
    const TYPE_ALERT       = 'alert';
    const TYPE_WARNING     = 'warning';

    public function getId();
    public function setOwner(UserInterface $owner);
    public function getOwner();
    public function setMessage($message);
    public function getMessage();
    public function setLink($link);
    public function getLink();
    public function setType($type);
    public function getType();
    public function setIsRead($isRead);
    public function isRead();
    public function setCreatedAt(\DateTime $createdAt);
    public function getCreatedAt();
}