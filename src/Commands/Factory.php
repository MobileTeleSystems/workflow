<?php

namespace Workflow\Commands;


use Workflow\Contracts\CommandFactory;
use Workflow\Contracts\Subject;

/**
 * Class Factory
 * @package Workflow\Commands
 */
abstract class Factory implements CommandFactory
{
    /**
     * @var Subject
     */
    protected $subject;

    /**
     * Factory constructor.
     * @param Subject $subject
     */
    public function __construct(Subject $subject)
    {
        $this->subject = $subject;
    }
}