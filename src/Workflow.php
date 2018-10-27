<?php

namespace Workflow;


use LogicException;
use Workflow\Contracts\Command;

/**
 * Class Workflow
 * @package Workflow
 */
class Workflow
{
    /**
     * @var Definition
     */
    private $definition;

    /**
     * Workflow constructor.
     *
     * @param Definition $definition
     */
    public function __construct(Definition $definition)
    {
        $this->definition = $definition;
    }

    /**
     * @param Action $action
     *
     * @return bool
     */
    public function can(Action $action): bool
    {
        /** @var Transition $transition */
        $transition = $this->definition->getTransitions()->first(
            function (Transition $transition) use ($action) {
                return $transition->getName() === $action->getTransition();
            }
        );

        if (null === $transition) {
            return false;
        }

        return null !== $transition
                ->getRoutes()
                ->first(function (Route $route) use ($action) {
                    return $route->getFrom() === $action->getState() &&
                        ($route->getWho()->isEmpty() || $route->getWho()->contains($action->getWho()));
                });
    }

    /**
     * @param Action  $action
     * @param Command $command
     *
     * @return mixed
     */
    public function make(Action $action, Command $command)
    {
        if (!$this->can($action)) {
            $this->throwTransitionError($action);
        }

        return $command->execute();
    }

    /**
     * @param Action $action
     */
    private function throwTransitionError(Action $action): void
    {
        $error = sprintf(
            'Can not make transition "%s" on state "%s"', $action->getTransition(), $action->getState()
        );

        if ($action->getWho()) {
            $error .= sprintf(' by "%s"', $action->getWho());
        }

        throw new LogicException($error);
    }
}