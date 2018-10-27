<?php

namespace Workflow;


use Assigner\Contracts\Assignable;
use Assigner\Traits\Assigner;
use Assigner\Collection;

/**
 * Class Transition
 * @package Workflow
 */
class Transition implements Assignable
{
    use Assigner;

    /**
     * @var string
     */
    private $name;

    /**
     * @var Collection|Route[]
     */
    private $routes;

    /**
     * Transition constructor.
     */
    public function __construct()
    {
        $this->initCollection('routes', Route::class);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Collection|Route[]
     */
    public function getRoutes(): Collection
    {
        return $this->routes;
    }
}