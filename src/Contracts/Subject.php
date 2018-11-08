<?php

namespace Workflow\Contracts;


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