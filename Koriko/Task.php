<?php

namespace Oridoki\KorikoBundle\Koriko;

class Task
{
    protected $_task_name = '';

    public function __construct($task_name)
    {
        $this->_task_name = $task_name;
    }

    public function run($command)
    {
        echo "\n\tCommand $command on " . $this->_task_name;
    }
}
