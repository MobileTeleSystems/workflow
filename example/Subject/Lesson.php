<?php

namespace WorkflowExample\Subject;


use Workflow\Contracts\CommandFactory as FactoryContract;
use Workflow\Contracts\Subject;
use WorkflowExample\Commands\Factory;

class Lesson implements Subject
{
    private $state;

    public function __construct()
    {
        $this->state = 'started';
    }

    public function getState()
    {
        return $this->state;
    }

    public function getCommandFactory(): FactoryContract
    {
        return new Factory($this);
    }

    public function setState(string $state)
    {
        $this->state = $state;
        $this->report();
    }

    public function report()
    {
        printf('Current state: %s', $this->getState());
        print PHP_EOL;
    }
}