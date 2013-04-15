<?php
namespace Oridoki\Koriko\Tests\Dummy\App;

use Oridoki\Koriko\App\Application;

/**
 * Dummy extension of the koriko Application for testing purpouses
 *
 * @author Kpacha <kpacha666@gmail.com>
 */
class DummyApplication extends Application
{
    const NAME = 'Dummy Deploy System';

    /**
     * Simple DIC getter for testing
     * @return \Pimple
     */
    public function getContainer()
    {
        return $this->_container;
    }
}