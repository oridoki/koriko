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
        $this->_assertDependency('logger', '\Monolog\Logger');
    }

    public function testSshHelperGeneration()
    {
        $this->_assertDependency('ssh', '\Oridoki\Koriko\App\Ssh');
    }

    protected function _assertDependency($helperName, $helperClass)
    {
        $dependency = $this->_subject[$helperName];
        $this->assertNotNull($dependency);
        $this->assertInstanceOf($helperClass, $dependency);
    }
}
