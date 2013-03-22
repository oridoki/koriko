<?php

namespace Oridoki\KorikoBundle\Koriko;

use \Oridoki\WrapWrapWrapBundle\Wrapper\Ssh;

class Koriko
{
    protected $_ssh     = null;
    protected $_path    = 'cd ~';

    protected function task($task_name, $options, $block)
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

    public function pathCommand($command)
    {
        # TODO refactor this crappy method
        $key = 'cd ';
        if (strstr($command, $key)) {
            $this->_path = substr($command, strpos($command, $key) + strlen($key), strlen($command));
            if (strstr($command, ';')) {
                $this->_path = substr($this->_path, 0, strpos($this->_path, ';') + 1);
            }
            $this->_path += ';';
        }
        return $this->_path;
    }

    public function ssh()
    {
        if ($this->_ssh === null) {
            $this->_ssh = new Ssh();
        }
        return $this->_ssh;
    }
}

