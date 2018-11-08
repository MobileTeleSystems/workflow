# Simple workflow

## Example

workflow.yml
```
test:
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
```
Usage:
```
$registry = new \Workflow\Registry();
$registry->load('workflow.yml');

$definition = $registry->get('test');
$subject    = new TestSubject();
$who        = new Student();
$context    = new SomeContext();
$workflow   = new \Workflow\Workflow($subject, $definition)

$workflow->can('pause', $student); //true

$workflow->make('pause', $student, $context);
