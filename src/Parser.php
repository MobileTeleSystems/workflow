<?php

namespace Workflow;


use RuntimeException;
use Illuminate\Support\Collection;
use Symfony\Component\Yaml\Yaml;

/**
 * Class Parser
 * @package Workflow
 */
final class Parser
{
    /**
     * @param string $file
     *
     * @return Collection
     */
    public function parseYaml(string $file): Collection
    {
        if (!is_readable($file)) {
            throw new RuntimeException('Configuration file does not exists or can not be read');
        }

        $data = Yaml::parse(file_get_contents($file));

        if(!\is_array($data)) {
            throw new RuntimeException('Configuration file can not be parsed');
        }

        return $this->parseArray($data);
    }

    /**
     * @param array $data
     * @return Collection
     */
    public function parseArray(array $data): Collection
    {
        $list = new Collection();

        foreach ($data as $name => $config) {
            $definition = new Definition();
            $definition->assign($config);
            $definition->validate();

            $list->put($name, $definition);
        }

        return $list;
    }
}