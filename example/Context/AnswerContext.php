<?php

namespace WorkflowExample\Context;


use Workflow\Contracts\Context;

class AnswerContext implements Context
{
    public $question = 1;

    public $answer = 'answer to the first question';
}