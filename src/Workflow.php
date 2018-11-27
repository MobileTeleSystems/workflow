<?php

namespace Workflow;


use LogicException;
use Workflow\Contracts\CanBeAsked;
use Workflow\Contracts\Command;
use Workflow\Contracts\Context;
use Workflow\Contracts\Subject;
use Workflow\Contracts\Who;
use Workflow\Contracts\Performer;
use Workflow\Contracts\Responder;
use Workflow\Who\Anybody;

/**
 * Class Workflow
 * @package Workflow
 */
class Workflow implements Performer, Responder
{
    /**
     * @var Subject
     */
    protected $subject;

    /**
     * @var Definition
     */
    protected $definition;

    /**
     * Workflow constructor.
     *
     * @param Subject    $subject
     * @param Definition $definition
     */
    public function __construct(Subject $subject, Definition $definition)
    {
        $this->subject    = $subject;
        $this->definition = $definition;
    }

    /**
     * @param string   $command
     * @param Who|null $who
     *
     * @return bool
     */
    public function can(string $command, Who $who = null): bool
    {
        /** @var Transition|null $transition */
        $transition = $this->definition->getTransitions()->first(
            function (Transition $defined) use ($command) {
                return $command === $defined->getName();
            }
        );

        if (null === $transition) {
            return false;
        }

        $who = $who ?? new Anybody;

        $route = $transition->getRoutes()->first(
            function (Route $route) use ($who) {
                return $route->isFrom($this->subject->getState()) &&
                    ($route->isAllowedForAnybody() || $route->isAllowed($who));
            }
        );

        return null !== $route;
    }

    /**
     * @param string       $command
     * @param Who|null     $who
     * @param Context|null $context
     *
     * @return mixed
     */
    public function make(string $command, Who $who = null, Context $context = null)
    {
        if (!$this->can($command, $who)) {
            $this->throwTransitionError($command, $who);
        }

        $command = $this->subject->getCommandFactory()->create($command, $who, $context);

        return $this->run($command);
    }

    /**
     * @param string       $query
     * @param Who|null     $who
     * @param Context|null $context
     *
     * @return mixed
     */
    public function ask(string $query, Who $who = null, Context $context = null)
    {
        if ($this->subject instanceof CanBeAsked) {
            return $this->subject->getQueryFactory()->create($query, $who, $context)->handle();
        }

        throw new LogicException(sprintf('"%s" does not support responding queries', get_class($this->subject)));
    }

    /**
     * @param Command $command
     *
     * @return mixed
     */
    protected function run(Command $command)
    {
        return $command->handle();
    }

    /**
     * @param string   $command
     * @param Who|null $who
     */
    private function throwTransitionError(string $command, Who $who = null): void
    {
        $error = sprintf('Can not make transition "%s" on state "%s"', $command, $this->subject->getState());

        if (null !== $who) {
            $error .= sprintf(' by %s', implode(' or ', $who->getRoles()));
        }

        throw new LogicException($error);
    }
}