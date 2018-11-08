<?php

require_once '../vendor/autoload.php';

$registry = new \Workflow\Registry();
$registry->load('workflow.yml');

$definition = $registry->get('lesson');
$lesson = new \WorkflowExample\Subject\Lesson();
$student = new \WorkflowExample\Who\Student();
$teacher = new \WorkflowExample\Who\Teacher();
$answer = new \WorkflowExample\Context\AnswerContext();

$workflow = new \Workflow\Workflow($lesson, $definition);

$lesson->report();
print PHP_EOL;

if (!$workflow->can('answer', $teacher)) {
    print_r('Teacher can not answer the question' . PHP_EOL);
}

$workflow->make('answer', $student, $answer);
$workflow->make('pause', $teacher);
$workflow->make('start', $teacher);
$workflow->make('finish', $student);
