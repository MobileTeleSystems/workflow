<?php

namespace Workflow\Contracts;


/**
 * Interface Command
 * @package Workflow\Contracts
 */
interface Command
{
    /**
     * Execute the command
     */
    public function execute();
}