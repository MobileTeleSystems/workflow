# Simple workflow

## Installation

    composer require php-utils/workflow

## Example

RUN docker-compose up -d

RUN docker exec workflow bash -c 'cd example && php example.php'

## Usage
```

$registry = new \Workflow\Registry();
$registry->load('workflow.yml');

$definition = $registry->get('lesson');
$lesson     = new \WorkflowExample\Subject\Lesson();

$student    = new \WorkflowExample\Who\Student();
$teacher    = new \WorkflowExample\Who\Teacher();

$answer     = new \WorkflowExample\Context\AnswerContext();

$workflow   = new \Workflow\Workflow($lesson, $definition);

$lesson->report(); // Current state: started


$workflow->can('answer', $teacher); // false

$workflow->make('answer', $student, $answer);
// student executed command: answer. Question #1, answer: answer to the first question 

$workflow->make('pause', $teacher);
// teacher executed command: pause
// Current state: paused

$workflow->make('start', $teacher);
// teacher executed command: start
// Current state: started

$workflow->make('finish', $student);
// student executed command: finish
// Current state: finished
```


workflow.yml
```
lesson:
  states:
    - started
    - paused
    - finished
  transitions:
    - name: pause
      routes:
        - from: started
          to: paused
          who: [student, teacher]
    - name: answer
      routes:
        - from: started
          to: started
          who: [student]
    - name: start
      routes:
        - from: paused
          to: started
          who: [student, teacher]
    - name: finish
      routes:
        - from: paused
          to: finished
          who: [student]
        - from: started
          to: finished
          who: [student]        
```

