<?php

namespace Workflow\Contracts;


/**
 * Interface Responder
 * @package Workflow\Contracts
 */
interface Responder
{
    /**
     * @param string       $query
     * @param Who|null     $who
     * @param Context|null $context
     *
     * @return mixed
     */
    public function ask(string $query, Who $who = null, Context $context = null);
}