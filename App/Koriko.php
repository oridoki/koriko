<?php

namespace Oridoki\Koriko\App;

class Koriko
{
    /**
     * Path to work ok
     * @var string
     */
    protected $_path = 'cd ~';

    /**
     * The dependency injection container
     * @var \Pimple
     */
    protected $_container;

    public function __construct(\Pimple $container) {
        $this->_container = $container;
    }

    /**
     * Will run a task for the current script
     * @param string $task_name
     * @param array $options
     * @param function $block
     */
    public function task($task_name, $options, $block)
    {
        $task = new Task($this, $task_name);

        $this->_connect($options);
        $block($task);
        $this->_disconnect();
    }

    /**
     * Connect to given host
     * @param $options ['host', 'port', 'user', 'password']
     */
    protected function _connect($options)
    {
        $options = $this->_normalize($options);

        $this->helper('ssh')->connect(
            $options['host'],
            $options['port'],
            $options['user'],
            $options['password']
        );
    }

    /**
     * Disconnect current ssh session
     */
    protected function _disconnect()
    {
        $this->helper('ssh')->disconnect();
    }

    /**
     * Get normalized options
     * @param array $options
     * @return array
     */
    protected function _normalize($options)
    {
        $defaults = array(
            'host'      => '',
            'port'      => '22',
            'user'      => '',
            'password'  => ''
        );
        return array_merge($defaults, $options);
    }

    /**
     * Get the required helper from the DIC
     * @param string $helperName
     * @return mixed
     */
    public function helper($helperName)
    {
        return $this->_container[$helperName];
    }
}

