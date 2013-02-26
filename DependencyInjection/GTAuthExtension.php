<?php

namespace GT\AuthBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class GTAuthExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('gt_auth.title_page', $config["title_page"]);
        $container->setParameter('gt_auth.title_block', $config["title_block"]);
        $container->setParameter('gt_auth.header_tpl', $config["header_tpl"]);
        $container->setParameter('gt_auth.footer_tpl', $config["footer_tpl"]);
        $container->setParameter('gt_auth.redirect_success', $config["redirect_success"]);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
}
