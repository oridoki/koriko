<?php

namespace Oridoki\Koriko\App;

use \Oridoki\Koriko\App\Ssh;

class Koriko
{
    /**
     * Ssh client
     * @var null|Oridoki\Koriko\App\Ssh
     */
    protected $_ssh     = null;

    /**
     * Path to work ok
     * @var string
     */
    protected $_path    = 'cd ~';

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

        $this->ssh()->connect(
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
        $this->ssh()->disconnect();
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
     * Ssh client getter
     * @return null|Oridoki\Koriko\App\Ssh
     */
    public function ssh()
    {
        if ($this->_ssh === null) {
            $this->_ssh = new Ssh();
        }
        return $this->_ssh;
    }

    /**
     * Ssh client injector
     * @param Oridoki\Koriko\App\SSh $ssh
     */
    public function setSsh($ssh)
    {
        $this->_ssh = $ssh;
    }
}

