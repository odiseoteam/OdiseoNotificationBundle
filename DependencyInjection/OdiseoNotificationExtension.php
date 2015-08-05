<?php

namespace Odiseo\Bundle\NotificationBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Sylius\Bundle\ResourceBundle\DependencyInjection\AbstractResourceExtension;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class OdiseoNotificationExtension extends AbstractResourceExtension
{
    /**
     * {@inheritdoc}
     */
	protected $applicationName = 'odiseo';
	protected $configFormat = self::CONFIG_YAML;
	
	public function load(array $config, ContainerBuilder $container)
	{
		$this->configure(
				$config,
				new Configuration(),
				$container,
				self::CONFIGURE_LOADER | self::CONFIGURE_DATABASE | self::CONFIGURE_PARAMETERS  );
	}
}
