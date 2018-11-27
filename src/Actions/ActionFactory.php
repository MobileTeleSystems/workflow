<?php

namespace Workflow\Actions;


use Workflow\Contracts\Subject;

/**
 * Class CommandFactory
 * @package Workflow\Commands
 */
abstract class ActionFactory
{
    /**
     * @var Subject
     */
    protected $subject;

    /**
     * CommandFactory constructor.
     *
     * @param Subject $subject
     */
    public function __construct(Subject $subject)
    {
        $this->subject = $subject;
    }
}