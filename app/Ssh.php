<?php

namespace Oridoki\Koriko\App;

/**
 * SSH2 php library wrapper
 */
class Ssh
{
    /**
     * Remote connection handler
     * @var handler
     */
    protected $_connection  = null;

    /**
     * Current execution path
     * @var string
     */
    protected $_path = '';

    /**
     * Connects to a remote server
     * @param String $host
     * @param String $port
     * @param String $user
     * @param String $password
     * @throws \Exception on failed connection
     */
    public function connect($host, $port, $user, $password)
    {
        $this->_connection = \ssh2_connect($host, $port);
        if (!$this->_connection) {
            throw \Exception("Can't connect to remote server");
        }

        $this->_auth($user, $password);
    }


    /**
     * Disconnect from remote host
     */
    public function disconnect() {
        $this->execute('echo "EXITING" && exit;');
        $this->_connection = null;
    }


    /**
     * Remote server authentication
     * @param String $usr
     * @param String $pwd
     * @throws \Exception
     */
    protected function _auth($usr, $pwd)
    {
        if (!\ssh2_auth_password($this->_connection, $usr, $pwd)) {
            throw new \Exception("Can't authenticate on remote server");
        }
    }


    /**
     * Executes a remote command and return the command output
     * @param $command
     * @return String
     * @throws \Exception on remote error
     */
    public function execute($command)
    {
        $command = $this->pathCommand($command);

        $stream = \ssh2_exec($this->_connection, $command);
        $errorStream = \ssh2_fetch_stream($stream, SSH2_STREAM_STDERR);

        stream_set_blocking($stream, true);
        stream_set_blocking($errorStream, true);

        $output = stream_get_contents($stream);
        $error  = stream_get_contents($errorStream);

        if ($error) {
            throw new \Exception("Remote execution error : " . $error);
        }

        return $output;
    }

    /**
     * Set the command on current path
     * @param string $command
     * @return string
     */
    public function pathCommand($command)
    {
        # TODO refactor this crappy method
        $key    = 'cd ';

        if (!strstr($command, $key)) {
            return "cd $this->_path; " . $command;
        }

        $this->_path = substr($command, strpos($command, $key) + strlen($key), strlen($command));
        if (strstr($command, ';')) {
             $this->_path = substr($this->_path, 0, strpos($this->_path, ';'));
        }
        return $command;
    }

}