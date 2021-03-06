<?php

namespace Workflow\Contracts\Actions;


use Workflow\Contracts\Context;
use Workflow\Contracts\Subject;
use Workflow\Contracts\Who;

/**
 * Interface CommandFactory
 * @package Workflow\Contracts
 */
interface CommandFactory
{
    /**
     * CommandFactory constructor.
     *
     * @param Subject $subject
     */
    public function __construct(Subject $subject);

    /**
     * @param string       $command
     * @param Who|null     $who
     * @param Context|null $context
     *
     * @return Command
     */
    public function create(string $command, Who $who = null, Context $context = null): Command;
}