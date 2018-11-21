<?php

namespace Workflow\Who;


use Workflow\Contracts\Who;

/**
 * Class Anybody
 * @package Workflow\Who
 */
final class Anybody implements Who
{
    /**
     * @return array
     */
    public function getRoles(): array
    {
        return [];
    }
}