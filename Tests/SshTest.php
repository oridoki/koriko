<?php

namespace Oridoki\Koriko\Tests;

use Oridoki\Koriko\App\Ssh;

class SshTest extends \PHPUnit_Framework_TestCase
{
    protected $_subject;

    public function setUp()
    {
        $this->_subject = new Ssh;
    }

    public function testPathCommand()
    {
        $commands = [
            'cd /home/Users/kumulo; ls -la' => 'cd /home/Users/kumulo; ls -la',
            'ls -lax' => 'cd /home/Users/kumulo; ls -lax'
        ];

        foreach ($commands as $command => $result) {
            $this->assertEquals(
                $result,
                $this->_subject->pathCommand($command)
            );
        }
    }
}
