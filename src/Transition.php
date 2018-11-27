<?php

namespace Workflow;


use Assigner\Contracts\Assignable;
use Assigner\Traits\Assigner;
use Assigner\Collection;

/**
 * Class Transition
 * @package Workflow
 */
final class Transition implements Assignable
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
     *
     * @param string|null $name
     */
    public function __construct(string $name = null)
    {
        $this->name = $name;
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