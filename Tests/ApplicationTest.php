<?php

namespace Oridoki\Koriko\Tests;

use Oridoki\Koriko\App\Application;
use Oridoki\Koriko\Command\KorikoCommand;

class ApplicationTest extends \PHPUnit_Framework_TestCase
{

    protected $_subject;

    public function testScanForCommandsInDefaultFolder()
    {
        $this->_subject = new Application;
        $command = new KorikoCommand;
        $command->setApplication($this->_subject);
        $this->assertEquals($command, $this->_subject->get($command->getName()));
    }

    public function testScanForCommandsInCustomFolder()
    {
        $this->_subject = new Application('/../Command');
        $command = new KorikoCommand;
        $command->setApplication($this->_subject);
        $this->assertEquals($command, $this->_subject->get($command->getName()));
    }

    public function testScanForCommandsJustScanForCommands()
    {
        $this->_subject = new Application('/.');
        $this->assertEquals(2, count($this->_subject->all()));
    }

}
