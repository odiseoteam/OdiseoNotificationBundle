<?php
namespace Odiseo\Bundle\AdsCandyBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use Acme\StoreBundle\Order;

class NotificationEventMetadata
{
	
	
	public function __construct(Order $order)
	{
		$this->order = $order;
	}

	public function getOrder()
	{
		return $this->order;
	}
}