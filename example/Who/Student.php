<?php

namespace WorkflowExample\Who;


use Workflow\Contracts\Who;

class Student implements Who
{
    public function getRoles()
    {
        return collect('student');
    }
}