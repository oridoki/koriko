<?php

namespace Oridoki\Koriko\Helper;


abstract class HelperAbstract
{
    /**
     * @var \Oridoki\Koriko\App\Task
     */
    protected $_task;

    /**
     * Constructor
     * @param \Oridoki\Koriko\App\Task $task
     */
    public function __construct($task)
    {
        $this->_task = $task;
    }

    /**
     * Will run a command
     * @param string $cmd
     * @return string
     */
    protected function run($cmd)
    {
        return $this->_task->run($cmd);
    }
}