<?php

namespace Workflow;

use Assigner\Contracts\Assignable;
use Assigner\Traits\Assigner;
use Assigner\Collection;

/**
 * Class Route
 * @package Workflow
 */
class Route implements Assignable
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
}