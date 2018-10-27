<?php

namespace Workflow;


/**
 * Class Action
 * @package Workflow
 */
class Action
{
    /**
     * @var string
     */
    private $state;

    /**
     * @var string
     */
    private $transition;

    /**
     * @var string|null
     */
    private $who;

    /**
     * Action constructor.
     *
     * @param string      $state
     * @param string      $transition
     * @param string|null $who
     */
    public function __construct(string $state, string $transition, string $who = null)
    {
        $this->setState($state)
            ->setTransition($transition)
            ->setWho($who);
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $state
     *
     * @return Action
     */
    public function setState(string $state): Action
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return string
     */
    public function getTransition(): string
    {
        return $this->transition;
    }

    /**
     * @param string $transition
     *
     * @return Action
     */
    public function setTransition(string $transition): Action
    {
        $this->transition = $transition;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getWho(): ?string
    {
        return $this->who;
    }

    /**
     * @param string|null $who
     *
     * @return Action
     */
    public function setWho(?string $who): Action
    {
        $this->who = $who;
        return $this;
    }
}