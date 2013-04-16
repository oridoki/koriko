<?php

namespace Oridoki\Koriko\Tests;

trait Mocks
{
    public function sshMock()
    {
        $sshKlass = 'Oridoki\Koriko\App\Ssh';

        $ssh = $this->getMockBuilder($sshKlass)->getMock();
        $ssh->expects($this->any())
            ->method('connect')
            ->will($this->returnValue(true));
        $ssh->expects($this->any())
            ->method('disconnect')
            ->will($this->returnValue(true));
        $ssh->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(true));

        return $ssh;
    }

    public function korikoMock($exception)
    {
        $sshKlass = 'Oridoki\Koriko\App\Koriko';

        $ssh = $this->getMockBuilder($sshKlass)
                ->disableOriginalConstructor()
                ->getMock();
        $ssh->expects($this->any())
            ->method('helper')
            ->will($this->throwException($exception));

        return $ssh;
    }

    public function loggerMock()
    {
        $loggerKlass = 'Monolog\Logger';

        $logger = $this->getMockBuilder($loggerKlass)
                ->disableOriginalConstructor()
                ->getMock();
        $logger->expects($this->any())
            ->method('addWarning')
            ->will($this->returnValue(null));
        $logger->expects($this->any())
            ->method('addInfo')
            ->will($this->returnValue(null));
        $logger->expects($this->any())
            ->method('addError')
            ->will($this->returnValue(null));

        return $logger;
    }

    public function dicMock($content)
    {
        $dic = new \Pimple;
        foreach ($content as $name => $component) {
            $dic[$name] = $component;
        }
        return $dic;
    }
}
