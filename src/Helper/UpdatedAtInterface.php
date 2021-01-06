<?php

namespace App\DoctrineExtendBundle\Helper;

use DateTimeImmutable;

interface UpdatedAtInterface
{
    /**
     * @return DateTimeImmutable|null
     */
    public function getUpdatedAt(): ?DateTimeImmutable;

    /**
     * @param DateTimeImmutable $updatedAt
     */
    public function setUpdatedAt(DateTimeImmutable $updatedAt): void;
}
