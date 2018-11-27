<?php

namespace Workflow;


use Illuminate\Support\Collection;

/**
 * Class Registry
 * @package Workflow
 */
final class Registry
{
    /**
     * @var Collection|Definition[]
     */
    private $list;

    /**
     * Registry constructor.
     */
    public function __construct()
    {
        $this->list = new Collection;
    }

    /**
     * @param string     $name
     * @param Definition $definition
     */
    public function add(string $name, Definition $definition)
    {
        $this->list->put($name, $definition);
    }

    /**
     * @param string $name
     *
     * @return null|Definition
     */
    public function get(string $name): ?Definition
    {
        return $this->list->get($name);
    }
}