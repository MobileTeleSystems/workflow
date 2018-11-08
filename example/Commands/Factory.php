<?php

namespace WorkflowExample\Commands;


use Workflow\Commands\Factory as CommandFactory;
use Workflow\Contracts\Command;
use Workflow\Contracts\Context;
use Workflow\Contracts\Who;

class Factory extends CommandFactory
{
    public function create(string $command, Who $who = null, Context $context = null): Command
    {
        switch ($command) {
            case 'start':
                return new Start($this->subject, $who, $context);
            case 'pause':
                return new Pause($this->subject, $who, $context);
            case 'finish':
                return new Finish($this->subject, $who, $context);
            case 'answer':
                return new Answer($this->subject, $who, $context);
            default:
                throw new \InvalidArgumentException(sprintf('Command for action "%s" is not defined', $command));
        }
    }
}