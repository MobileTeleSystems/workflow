<?php

namespace WorkflowExample\Commands;


class Pause extends LessonCommand
{
    public function handle()
    {
        printf('%s executed command: pause', implode(' ', $this->who->getRoles()));
        print PHP_EOL;
        $this->getLesson()->setState('paused');
        print PHP_EOL;
    }
}