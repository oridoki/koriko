<?php

namespace Oridoki\Koriko\App;

use \Oridoki\Koriko\App\Ssh;

class Koriko
{
    protected $_ssh     = null;
    protected $_path    = 'cd ~';

    public function task($task_name, $options, $block)
    {
        $task = new Task($this, $task_name);

        $this->_connect($options);
        $block($task);
        $this->_disconnect();
    }

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

    protected function _disconnect()
    {
        $this->ssh()->disconnect();
    }

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

    public function ssh()
    {
        if ($this->_ssh === null) {
            $this->_ssh = new Ssh();
        }
        return $this->_ssh;
    }

    public function setSsh($ssh)
    {
        $this->_ssh = $ssh;
    }
}

