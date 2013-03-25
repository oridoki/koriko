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

        $ssh = $this->getMockBuilder($sshKlass)->getMock();
        $ssh->expects($this->any())
            ->method('ssh')
            ->will($this->throwException($exception));

        return $ssh;
    }
}
