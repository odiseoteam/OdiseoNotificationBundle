<?php

namespace Odiseo\Bundle\AdsCandyBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use Acme\StoreBundle\Order;

class NotificationEventsHandler extends Event
{
	protected $order;

	public function __construct(Order $order)
	{
		$this->order = $order;
	}

	public function getOrder()
	{
		return $this->order;
	}
}