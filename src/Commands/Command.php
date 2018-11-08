<?php

namespace Workflow\Commands;


use Workflow\Context\EmptyContext;
use Workflow\Contracts\Command as CommandContract;
use Workflow\Contracts\Context;
use Workflow\Contracts\Subject;
use Workflow\Contracts\Who;
use Workflow\Who\Anybody;

/**
 * Class Command
 * @package Workflow\Commands
 */
abstract class Command implements CommandContract
{
    /**
     * @var Subject
     */
    protected $subject;

    /**
     * @var Who
     */
    protected $who;

    /**
     * @var Context
     */
    protected $context;

    /**
     * Command constructor.
     * @param Subject $subject
     * @param Who|null $who
     * @param Context|null $context
     */
    public function __construct(Subject $subject, Who $who = null, Context $context = null)
    {
        $this->subject = $subject;
        $this->who     = $who ?? new Anybody;
        $this->context = $context ?? new EmptyContext;
    }
}