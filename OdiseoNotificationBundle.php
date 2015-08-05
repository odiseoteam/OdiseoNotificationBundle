<?php

namespace Odiseo\Bundle\NotificationBundle;

use Sylius\Bundle\ResourceBundle\AbstractResourceBundle;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;
use Sylius\Bundle\ResourceBundle\ResourceBundleInterface;

class OdiseoNotificationBundle extends AbstractResourceBundle
{
	protected $mappingFormat = ResourceBundleInterface::MAPPING_YAML;
	
	public static function getSupportedDrivers()
	{
		return array(
				SyliusResourceBundle::DRIVER_DOCTRINE_ORM,
		);
	}


	protected function getModelNamespace()
	{
		return 'Odiseo\Bundle\NotificationBundle\Model';
	}
}
