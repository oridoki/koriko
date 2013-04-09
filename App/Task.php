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
     * Helpers to be set
     * @var array
     */
    protected $_helpers     = array();

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
        $this->_ssh()->execute($command);
    }

    /**
     * Get the ssh connector
     * @return \Oridoki\Koriko\App\Ssh
     */
    protected function _ssh()
    {
        return $this->_koriko->ssh();
    }

    /**
     * Get mysql helper
     * @return mixed
     */
    public function mysql()
    {
        return $this->_helper('MySQL');
    }

    /**
     * Get a helper related with name
     * @param string $helper
     * @return mixed
     */
    protected function _helper($helper)
    {
        if (!array_key_exists($helper, $this->_helpers)) {
            $helperName = $this->_helperClassName($helper);
            $this->_helpers[$helper] = new $helperName($this);
        }

        return $this->_helpers[$helper];
    }

    /**
     * Get the complete helper class name
     * @param string $helper
     * @return string
     */
    protected function _helperClassName($helper)
    {
        return implode("\\", ['Oridoki', 'Koriko', 'Helper', $helper]);
    }

}
