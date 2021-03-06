<?php

/**
 * @author: Julien Mercier-Rojas <julien@jeckel-lab.fr>
 * Created at: 06/01/2021
 */

declare(strict_types=1);

namespace JeckelLab\DoctrineExtendBundle;

use JeckelLab\DoctrineExtendBundle\DependencyInjection\DoctrineExtendExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class JeckelLabDoctrineExtendBundle
 * @package JeckelLab\DoctrineExtendBundle
 */
class JeckelLabDoctrineExtendBundle extends Bundle
{
    /**
     * @return DoctrineExtendExtension|ExtensionInterface|null
     */
    public function getContainerExtension()
    {
        return new DoctrineExtendExtension();
    }
}
