<?php

namespace Oridoki\Koriko\App;

class Task
{
    /**
     * \Oridoki\Koriko\App\Koriko
     * @var null|Koriko
     */
    protected $_koriko      = null;

    /**
     * Current task name
     * @var string
     */
    protected $_task_name   = '';

    /**
     * Constructor
     * @param \Oridoki\Koriko\App\Koriko $koriko
     * @param string $task_name
     */
    public function __construct($koriko, $task_name)
    {
        $this->_koriko      = $koriko;
        $this->_task_name   = $task_name;
    }

    /**
     * Run a given command
     * @param string $command
     */
    public function run($command)
    {
        $this->helper('ssh')->execute($command);
    }

    /**
     * Get a helper related with name
     * @param string $helper
     * @return mixed
     */
    public function helper($helper)
    {
        return $this->_koriko->helper($helper);
    }

}
