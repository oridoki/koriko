<?php

namespace Oridoki\Koriko\App;

use \Pimple;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/**
 * Description of KorikoContainer
 *
 * @author Kpacha <kpacha666@gmail.com>
 */
class KorikoContainer extends Pimple
{
    public function __construct()
    {
        $this['parameter'] = 'foo';
        $this->_initLogger();
        $this->_initConnectionHelpers();
        $this->_initTaskHelpers();
    }

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

    protected function _initConnectionHelpers()
    {
        $this['ssh'] = $this->share(function () {
            return new \Oridoki\Koriko\App\Ssh;
        });
    }

    protected function _initTaskHelpers()
    {
        $this['MySQL'] = $this->share(function () {
            return new \Oridoki\Koriko\Helper\MySQL;
        });
    }
}
