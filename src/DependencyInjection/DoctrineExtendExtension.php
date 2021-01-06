<?php

/**
 * @author: Julien Mercier-Rojas <julien@jeckel-lab.fr>
 * Created at: 06/01/2021
 */

declare(strict_types=1);

namespace JeckelLab\DoctrineExtendBundle\DependencyInjection;

use Exception;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Class DoctrineExtendExtension
 * @package JeckelLab\DoctrineExtendBundle\DependencyInjection
 */
class DoctrineExtendExtension extends Extension
{
    /**
     * @param array            $configs
     * @param ContainerBuilder $container
     * @throws Exception
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        (
            new YamlFileLoader(
                $container,
                new FileLocator(__DIR__ . '/../Resources/config')
            )
        )->load('services.yaml');
    }
}
