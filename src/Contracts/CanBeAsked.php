<?php

namespace Workflow\Contracts;


/**
 * Interface CanBeAsked
 * @package Workflow\Contracts
 */
interface CanBeAsked
{
    /**
     * @return QueryFactory
     */
    public function getQueryFactory(): QueryFactory;
}