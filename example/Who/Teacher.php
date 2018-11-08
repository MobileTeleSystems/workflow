<?php

namespace WorkflowExample\Who;


use Workflow\Contracts\Who;

class Teacher implements Who
{
    public function getRoles()
    {
        return collect('teacher');
    }
}