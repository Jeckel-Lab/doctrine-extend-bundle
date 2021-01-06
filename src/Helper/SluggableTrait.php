<?php

/**
 * @author: Julien Mercier-Rojas <julien@jeckel-lab.fr>
 * Created at: 07/06/2020
 */

declare(strict_types=1);

namespace App\DoctrineExtendBundle\Helper;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trait SluggableTrait
 * @package App\DoctrineExtendBundle\Helper
 */
trait SluggableTrait
{
    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @var string
     */
    private $slug = '';

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }
}
