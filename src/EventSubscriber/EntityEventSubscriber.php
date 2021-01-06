<?php

declare(strict_types=1);

namespace JeckelLab\DoctrineExtendBundle\EventSubscriber;

use JeckelLab\DoctrineExtendBundle\Helper\CreatedAtInterface;
use JeckelLab\DoctrineExtendBundle\Helper\SluggableInterface;
use JeckelLab\DoctrineExtendBundle\Helper\UpdatedAtInterface;
use Doctrine\Common\EventSubscriber;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;
use JeckelLab\Contract\Infrastructure\System\Clock;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * Class EntityEventSubscriber
 * @package JeckelLab\DoctrineExtendBundle\EventSubscriber
 */
final class EntityEventSubscriber implements EventSubscriber
{
    /** @var Clock */
    protected $timeService;

    /** @var SluggerInterface */
    protected $slugger;

    /**
     * EntityEventSubscriber constructor.
     * @param Clock            $timeService
     * @param SluggerInterface $slugger
     */
    public function __construct(Clock $timeService, SluggerInterface $slugger)
    {
        $this->timeService = $timeService;
        $this->slugger = $slugger;
    }

    /**
     * @return string[]
     */
    public function getSubscribedEvents(): array
    {
        return [
            Events::prePersist,
            Events::preUpdate
        ];
    }

    /**
     * @param LifecycleEventArgs $args
     */
    public function prePersist(LifecycleEventArgs $args): void
    {
        $entity = $args->getObject();
        if ($entity instanceof CreatedAtInterface) {
            $this->setCreatedAt($entity);
        }

        if ($entity instanceof UpdatedAtInterface) {
            $this->setUpdatedAt($entity);
        }

        if ($entity instanceof SluggableInterface) {
            $this->setSlug($entity);
        }
    }

    /**
     * @param LifecycleEventArgs $args
     */
    public function preUpdate(LifecycleEventArgs $args): void
    {
        $entity = $args->getObject();

        if ($entity instanceof CreatedAtInterface && $entity->getCreatedAt() === null) {
            $this->setCreatedAt($entity);
        }

        if ($entity instanceof UpdatedAtInterface) {
            $this->setUpdatedAt($entity);
        }
    }

    /**
     * @param CreatedAtInterface $entity
     */
    protected function setCreatedAt(CreatedAtInterface $entity): void
    {
        $entity->setCreatedAt($this->timeService->now());
    }

    /**
     * @param UpdatedAtInterface $entity
     */
    protected function setUpdatedAt(UpdatedAtInterface $entity): void
    {
        $entity->setUpdatedAt($this->timeService->now());
    }

    /**
     * @param SluggableInterface $entity
     */
    protected function setSlug(SluggableInterface $entity): void
    {
        $entity->setSlug(
            strtolower($this->slugger->slug($entity->getSlugSourceName())->toString())
        );
    }
}
