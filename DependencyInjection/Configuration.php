<?php

namespace GT\AuthBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('gt_auth');

        $rootNode
            ->children()
                ->scalarNode('title_page')->defaultValue("Admin Authification")->end()
                ->scalarNode('title_block')->defaultValue("Admin Plateform")->end()
                ->scalarNode('header_tpl')->defaultValue(NULL)->end()
                ->scalarNode('footer_tpl')->defaultValue(NULL)->end()
                ->scalarNode('redirect_success')->cannotBeEmpty()->isRequired()->end()
            ->end()
        ->end();

        return $treeBuilder;
    }
}
