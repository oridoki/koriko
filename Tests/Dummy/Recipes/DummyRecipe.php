<?php

namespace Oridoki\Koriko\Tests\Dummy\Recipes;

use Oridoki\Koriko\App\Koriko;

/**
 * A dummy recipe using some basic console commands
 */
class DummyRecipe extends Koriko
{
    function cook()
    {
        $this->helper('logger')->addWarning('starting the Dummy Recipe!');

        $this->task('mysql_restart', ['host' => 'localhost'], function($task) {
            $task->helper('MySQL')->stop();
            $task->helper('MySQL')->start();
        });
    }
}
