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
        return $this->read($file, 'yaml');
    }

    /**
     * @param string $file
     *
     * @return Collection
     */
    public function parseJson(string $file)
    {
        return $this->read($file, 'json');
    }
    
    /**
     * @param array $data
     *
     * @return Collection
     */
    public function parse(array $data): Collection
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

    /**
     * @param string $file
     * @param string $reader
     *
     * @return Collection
     */
    private function read(string $file, string $reader)
    {
        if (!is_readable($file) || false === ($content = file_get_contents($file))) {
            throw new RuntimeException('Configuration file does not exists or can not be read');
        }

        $wrongFileException = new RuntimeException('Configuration file can not be parsed');

        switch ($reader) {
            case 'yaml':
                $data = Yaml::parse($content);
                break;
            case 'json':
                $data = json_decode($content, true);
                break;
            default:
                throw $wrongFileException;
        }

        if (!\is_array($data)) {
            throw $wrongFileException;
        }

        return $this->parse($data);
    }
}