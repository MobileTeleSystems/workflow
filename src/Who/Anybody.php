<?php

namespace Workflow\Who;


use Illuminate\Support\Collection;
use Workflow\Contracts\Who;

/**
 * Class Anybody
 * @package Workflow\Who
 */
final class Anybody implements Who
{
    /**
     * @return Collection
     */
    public function getRoles()
    {
        return new Collection;
    }
}