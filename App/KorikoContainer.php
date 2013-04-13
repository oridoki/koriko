<?php

namespace Oridoki\Koriko\App;

use \Pimple;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/**
 * Dependency Injection Container for the Koriko Project
 *
 * @author Kpacha <kpacha666@gmail.com>
 */
class KorikoContainer extends Pimple
{
    public function __construct()
    {
        $this->_initLogger();
        $this->_initConnectionHelpers();
        $this->_initTaskHelpers();
    }

    /**
     * Setup the singleton logger
     */
    protected function _initLogger()
    {
        $this['logger'] = $this->share(function () {
            $log = new Logger('name');
            $log->pushHandler(new StreamHandler(
                    __DIR__ . '/../logs/koriko.log', Logger::WARNING
                ));
            return $log;
        });
    }

    /**
     * Setup the singleton ssh driver
     */
    protected function _initConnectionHelpers()
    {
        $this['ssh'] = $this->share(function () {
            return new \Oridoki\Koriko\App\Ssh;
        });
    }

    /**
     * Setup the default helpers for tasks 
     */
    protected function _initTaskHelpers()
    {
        // singleton MySQL helper
        $this['MySQL'] = $this->share(function () {
            return new \Oridoki\Koriko\Helper\MySQL;
        });
    }
}
