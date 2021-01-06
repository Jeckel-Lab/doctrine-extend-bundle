<?php

declare(strict_types=1);

namespace App\DoctrineExtendBundle\Helper;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;

trait CreatedAtTrait
{
    /**
     * @ORM\Column(type="datetime_immutable")
     * @var DateTimeImmutable|null
     */
    private $createdAt = null;

    /**
     * @return DateTimeImmutable|null
     */
    public function getCreatedAt(): ?DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * @param DateTimeImmutable $createdAt
     */
    public function setCreatedAt(DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}
