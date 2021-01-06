<?php

namespace App\DoctrineExtendBundle\Helper;

use DateTimeImmutable;

interface CreatedAtInterface
{
    /**
     * @return DateTimeImmutable|null
     */
    public function getCreatedAt(): ?DateTimeImmutable;

    /**
     * @param DateTimeImmutable $createdAt
     */
    public function setCreatedAt(DateTimeImmutable $createdAt): void;
}
