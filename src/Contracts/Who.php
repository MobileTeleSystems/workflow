<?php

namespace Workflow\Contracts;


/**
 * Interface Who
 * @package Workflow\Contracts
 */
interface Who
{
    /**
     * @return \Illuminate\Support\Collection|string[]
     */
    public function getRoles();
}