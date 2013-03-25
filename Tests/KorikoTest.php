<?php

namespace Oridoki\Koriko\Tests;
use Oridoki\Koriko\App\Koriko;

class KorikoTest extends \PHPUnit_Framework_TestCase
{
    use Mocks;

    protected $_subject;

    public function setUp()
    {
        $this->_subject = new Koriko;
    }

    public function testTask()
    {
        $taskName = 'supu';
        $options = [];
        $block = function() {
            throw new \Exception('Test');
        };

        $this->_subject->setSsh($this->sshMock());
        try {
            $this->_subject->task($taskName, $options, $block);
        } catch(\Exception $e) {
            $this->assertEquals('Test', $e->getMessage());
        }
    }

}
