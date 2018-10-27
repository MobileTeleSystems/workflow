<?php

namespace Workflow;


use RuntimeException;
use Illuminate\Support\Collection;
use Symfony\Component\Yaml\Yaml;

/**
 * Class Parser
 * @package Workflow
 */
class Parser
{
    /**
     * @var string
     */
    private $path;

    /**
     * Parser constructor.
     *
     * @param string $path
     */
    public function __construct(string $path)
    {
        $this->path = $path;
    }

    /**
     * @return Collection
     */
    public function parse(): Collection
    {
        if (!is_readable($this->path)) {
            throw new RuntimeException('Configuration file does not exists or can not be read');
        }

        $data      = Yaml::parse(file_get_contents($this->path));
        $workflows = new Collection();

        foreach ($data as $name => $definitionData) {
            $definition = new Definition();
            $definition->assign($definitionData);
            $definition->validate();

            $workflows->put($name, new Workflow($definition));
        }

        return $workflows;
    }
}