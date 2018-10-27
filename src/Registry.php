<?php

namespace Workflow;


use Illuminate\Support\Collection;

/**
 * Class Registry
 * @package Workflow
 */
class Registry
{
    /**
     * @var Collection|Workflow[]
     */
    private $workflows;

    /**
     * Registry constructor.
     */
    public function __construct()
    {
        $this->workflows = new Collection;
    }

    /**
     * @param string   $name
     * @param Workflow $workflow
     */
    public function add(string $name, Workflow $workflow)
    {
        $this->workflows->put($name, $workflow);
    }

    /**
     * @param string $name
     *
     * @return null|Workflow
     */
    public function get(string $name): ?Workflow
    {
        return $this->workflows->get($name);
    }

    /**
     * @param string $file
     */
    public function load(string $file): void
    {
        $parser = new Parser($file);

        $this->workflows = $parser->parse();
    }
}