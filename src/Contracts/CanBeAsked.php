<?php

namespace Workflow\Contracts;


use Workflow\Contracts\Actions\QueryFactory;

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