<?php

namespace WorkflowExample\Commands;


class Start extends LessonCommand
{
    public function handle()
    {
        printf('%s executed command: start', implode(' ', $this->who->getRoles()->toArray()));
        print PHP_EOL;
        $this->getLesson()->setState('started');
        print PHP_EOL;
    }
}