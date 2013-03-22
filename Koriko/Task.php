<?php

namespace Oridoki\KorikoBundle\Koriko;

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
        $command = $this->pathCommand($command);
        $this->_ssh()->execute($command);
    }

    protected function pathCommand($command)
    {
        return $this->_koriko->pathCommand($command);
    }

    protected function _ssh()
    {
        return $this->_koriko->ssh();
    }

}
