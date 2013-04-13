<?php

namespace Oridoki\Koriko\Helper;

class MySQL extends HelperAbstract
{
    /**
     * Starts mysql server
     * @param string $opts
     */
    public function start($opts = '')
    {
        $this->run("mysql start {$opts}");
    }

    /**
     * Stops mysql server
     * @param string $opts
     */
    public function stop($opts = '')
    {
        $this->run("mysql stop {$opts}");
    }

    /**
     * Restart the mysql server
     * @param string $opts
     */
    public function restart($opts = '')
    {
        $this->run("mysql restart {$opts}");
    }
}
