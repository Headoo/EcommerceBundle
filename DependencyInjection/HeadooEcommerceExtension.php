<?php

namespace Headoo\EcommerceBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class HeadooEcommerceExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        
        //Set parameters
        $container->setParameter('headoo_ecommerce.customergroup.entity', $config['customergroup']['entity']);
        $container->setParameter('headoo_ecommerce.service.entity', $config['service']['entity']);
        $container->setParameter('headoo_ecommerce.servicerange.entity', $config['servicerange']['entity']);
        $container->setParameter('headoo_ecommerce.pricecurrency.entity', $config['pricecurrency']['entity']);
        $container->setParameter('headoo_ecommerce.paymentmethod.entity', $config['paymentmethod']['entity']);
        $container->setParameter('headoo_ecommerce.ordereditem.entity', $config['ordereditem']['entity']);
        $container->setParameter('headoo_ecommerce.order.entity', $config['order']['entity']);
        $container->setParameter('headoo_ecommerce.confirmationemail.entity', $config['confirmationemail']['entity']);
        $container->setParameter('headoo_ecommerce.breadcrumb.home', $config['breadcrumb']['home']);
        $container->setParameter('headoo_ecommerce.store.email_sender', $config['store']['email_sender']);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

    }
    
    /**
     * Allow an extension to prepend the extension configurations.
     *
     * @param ContainerBuilder $container
     */
    public function prepend(ContainerBuilder $container)
    {
        // get all Bundles
        $bundles = $container->getParameter('kernel.bundles');
        if (isset($bundles['DoctrineBundle'])) {
            // Get configuration of our own bundle
            $configs = $container->getExtensionConfig($this->getAlias());
            $config = $this->processConfiguration(new Configuration(), $configs);

            // Prepare for insertion
            $forInsertion = array(
                'orm' => array(
                    'resolve_target_entities' => array(
                        'Headoo\EcommerceBundle\Model\CustomerGroupInterface' => $config['customergroup']['entity'],
                        'Headoo\EcommerceBundle\Model\PriceCurrencyInterface' => $config['pricecurrency']['entity']
                    )
                )
            );
            foreach ($container->getExtensions() as $name => $extension) {
                switch ($name) {
                    case 'doctrine':
                        $container->prependExtensionConfig($name, $forInsertion);
                        break;
                }
            }
        }
    }
    
    public function getAlias()
    {
        return 'headoo_ecommerce';
    }
}
