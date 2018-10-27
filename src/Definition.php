<?php

namespace Workflow;


use Assigner\Collection;
use Assigner\Contracts\Assignable;
use Assigner\Traits\Assigner;
use LogicException;

/**
 * Class Definition
 * @package Workflow
 */
class Definition implements Assignable
{
    use Assigner;

    /**
     * @var Collection|string[]
     */
    private $states;

    /**
     * @var Collection|Transition[]
     */
    private $transitions;

    /**
     * Definition constructor.
     */
    public function __construct()
    {
        $this->initCollection('states');
        $this->initCollection('transitions', Transition::class);
    }

    /**
     * @return Collection|string[]
     */
    public function getStates(): Collection
    {
        return $this->states;
    }

    /**
     * @return Collection|Transition[]
     */
    public function getTransitions(): Collection
    {
        return $this->transitions;
    }

    public function validate(): void
    {
        $this->transitions->each(function (Transition $transition) {
            $transition->getRoutes()->each(function (Route $route) use ($transition) {
                $this->throwErrorOnIllegalState($route->getFrom(), $transition->getName());
                $this->throwErrorOnIllegalState($route->getFrom(), $transition->getName());
            });
        });
    }

    /**
     * @param string $state
     * @param string $transition
     */
    private function throwErrorOnIllegalState(string $state, string $transition): void
    {
        if (!$this->states->contains($state)) {
            throw new LogicException(
                sprintf('State "%s" referenced in transition "%s" does not exist.', $state, $transition)
            );
        }
    }
}