<?php

namespace Workflow\Contracts;


/**
 * Interface Command
 * @package Workflow\Contracts
 */
interface Command
{
    /**
     * Command constructor.
     * @param Subject $subject
     * @param Who|null $who
     * @param Context|null $context
     */
    public function __construct(Subject $subject, Who $who = null, Context $context = null);

    public function handle();
}