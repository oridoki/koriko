<?php

namespace Oridoki\Koriko\App;

class Task
{
    protected $_koriko      = null;
    protected $_task_name   = '';

    public function __construct($koriko, $task_name)
    {
        $this->_koriko      = $koriko;
        $this->_task_name   = $task_name;
    }

    public function run($command)
    {
        $this->_ssh()->execute($command);
    }

    protected function _ssh()
    {
        return $this->_koriko->ssh();
    }

}
