<?php

namespace WorkflowExample\Commands;


class Finish extends LessonCommand
{
    public function execute()
    {
        printf('%s executed command: finish', implode(' ', $this->who->getRoles()->toArray()));
        print PHP_EOL;
        $this->getLesson()->setState('finished');
        print PHP_EOL;
    }
}