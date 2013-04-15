<?php

namespace Oridoki\Koriko\Tests;

use Oridoki\Koriko\App\KorikoContainer;

class KorikoContainerTest extends \PHPUnit_Framework_TestCase
{
    protected $_subject;
    
    public function setUp()
    {
        $this->_subject = new KorikoContainer;
    }

    public function testLoggerGeneration()
    {
        $logger = $this->_subject['logger'];
        $this->assertNotNull($logger);
        $this->assertInstanceOf('\Monolog\Logger', $logger);
    }

    public function testSshHelperGeneration()
    {
        $ssh = $this->_subject['ssh'];
        $this->assertNotNull($ssh);
        $this->assertInstanceOf('\Oridoki\Koriko\App\Ssh', $ssh);
    }
}
