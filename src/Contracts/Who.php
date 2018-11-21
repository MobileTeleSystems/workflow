<?php

namespace Workflow\Contracts;


/**
 * Interface Who
 * @package Workflow\Contracts
 */
interface Who
{
    /**
     * @return array|string[]
     */
    public function getRoles(): array;
}