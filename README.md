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
        - from: finished
          to: paused
          who: [student]

```
```
$registry = new \Workflow\Registry();
$registry->load('workflow.yml');
$workflow = $registry->get('test');
$action = new \Workflow\Action('started', 'pause', 'student');
$workflow->can($action); //true
/** \Workflow\Contracts\Command $command */
$workflow->make($action, $command);
