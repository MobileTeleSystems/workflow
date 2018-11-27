<?php

namespace Workflow\Actions;


use Workflow\Contracts\Context;
use Workflow\Contracts\Subject;
use Workflow\Contracts\Who;
use Workflow\Context\EmptyContext;
use Workflow\Who\Anybody;

/**
 * Class Action
 * @package Workflow\Commands
 */
abstract class Action
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
     *
     * @param Subject      $subject
     * @param Who|null     $who
     * @param Context|null $context
     */
    public function __construct(Subject $subject, Who $who = null, Context $context = null)
    {
        $this->subject = $subject;
        $this->who     = $who ?? new Anybody;
        $this->context = $context ?? new EmptyContext;
    }
}