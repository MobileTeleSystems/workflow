<?php

namespace Workflow\Contracts;


use Workflow\Contracts\Actions\CommandFactory;

/**
 * Interface Subject
 * @package Workflow\Contracts
 */
interface Subject
{
    /**
     * @return string
     */
    public function getState();

    /**
     * @return CommandFactory
     */
    public function getCommandFactory(): CommandFactory;
}