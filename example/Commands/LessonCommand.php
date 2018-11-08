<?php

namespace WorkflowExample\Commands;


use Workflow\Commands\Command;
use Workflow\Contracts\Context;
use Workflow\Contracts\Subject;
use Workflow\Contracts\Who;
use WorkflowExample\Subject\Lesson;

abstract class LessonCommand extends Command
{
    public function __construct(Subject $subject, ?Who $who = null, ?Context $context = null)
    {
        if (!$subject instanceof Lesson) {
            throw new \InvalidArgumentException('Command is defined only for Lesson');
        }

        parent::__construct($subject, $who, $context);
    }

    protected function getLesson()
    {
        return $this->subject;
    }
}