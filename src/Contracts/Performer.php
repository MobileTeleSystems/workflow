<?php

namespace Workflow\Contracts;


/**
 * Interface Performer
 * @package Workflow\Contracts
 */
interface Performer
{
    /**
     * @param string   $command
     * @param Who|null $who
     *
     * @return bool
     */
    public function can(string $command, Who $who = null): bool;

    /**
     * @param string       $command
     * @param Who|null     $who
     * @param Context|null $context
     *
     * @return mixed
     */
    public function make(string $command, Who $who = null, Context $context = null);
}