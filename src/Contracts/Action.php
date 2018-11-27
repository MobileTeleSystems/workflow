<?php

namespace Workflow\Contracts;


/**
 * Interface Action
 * @package Workflow\Contracts
 */
interface Action
{
    /**
     * Action constructor.
     *
     * @param Subject      $subject
     * @param Who|null     $who
     * @param Context|null $context
     */
    public function __construct(Subject $subject, Who $who = null, Context $context = null);

    /**
     * Execute action
     */
    public function handle();
}