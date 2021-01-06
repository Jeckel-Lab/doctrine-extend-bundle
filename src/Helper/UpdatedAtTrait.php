<?php

declare(strict_types=1);

namespace App\DoctrineExtendBundle\Helper;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;

/**
 * Trait UpdatedAtTrait
 * @package App\DoctrineExtendBundle\Helper
 */
trait UpdatedAtTrait
{
    /**
     * @ORM\Column(type="datetime_immutable")
     * @var DateTimeImmutable|null
     */
    private $updatedAt = null;

    /**
     * @return DateTimeImmutable|null
     */
    public function getUpdatedAt(): ?DateTimeImmutable
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTimeImmutable $updatedAt
     */
    public function setUpdatedAt(DateTimeImmutable $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}
