<?php

namespace Workflow;


use Assigner\Contracts\Assignable;
use Assigner\Traits\Assigner;
use Assigner\Collection;
use Workflow\Contracts\Who;

/**
 * Class Route
 * @package Workflow
 */
final class Route implements Assignable
{
    use Assigner;

    /**
     * @var string
     */
    private $from;

    /**
     * @var string
     */
    private $to;

    /**
     * @var Collection|string[]
     */
    private $who;

    /**
     * Route constructor.
     */
    public function __construct()
    {
        $this->initCollection('who');
    }

    /**
     * @return string
     */
    public function getFrom(): string
    {
        return $this->from;
    }

    /**
     * @return string
     */
    public function getTo(): string
    {
        return $this->to;
    }

    /**
     * @return Collection|string[]
     */
    public function getWho(): Collection
    {
        return $this->who;
    }

    /**
     * @return bool
     */
    public function isAllowedForAnybody(): bool
    {
        return $this->getWho()->isEmpty();
    }

    /**
     * @param Who $who
     * @return bool
     */
    public function isAllowed(Who $who): bool
    {
        return $this->getWho()->intersect($who->getRoles())->isNotEmpty();
    }

    /**
     * @param string $state
     * @return bool
     */
    public function isFrom(string $state): bool
    {
        return $this->getFrom() === $state;
    }
}