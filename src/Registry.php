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
     * @param string   $name
     * @param Definition $workflow
     */
    public function add(string $name, Definition $workflow)
    {
        $this->list->put($name, $workflow);
    }

    /**
     * @param string $name
     *
     * @return null|Workflow
     */
    public function get(string $name): ?Workflow
    {
        return $this->list->get($name);
    }

    /**
     * @param string $file
     */
    public function load(string $file): void
    {
        $this->list = (new Parser)->parse($file);
    }
}