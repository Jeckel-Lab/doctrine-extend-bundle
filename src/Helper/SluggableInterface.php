<?php

/**
 * @author: Julien Mercier-Rojas <julien@jeckel-lab.fr>
 * Created at: 07/06/2020
 */

declare(strict_types=1);

namespace App\DoctrineExtendBundle\Helper;

/**
 * Interface SluggableInterface
 * @package App\DoctrineExtendBundle\Helper
 */
interface SluggableInterface
{
    /**
     * @return string
     */
    public function getSlug(): string;

    /**
     * @param string $slug
     */
    public function setSlug(string $slug): void;

    /**
     * @return string
     */
    public function getSlugSourceName(): string;
}
