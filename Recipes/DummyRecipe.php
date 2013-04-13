<?php

namespace Oridoki\Koriko\Recipes;

use Oridoki\Koriko\App\Koriko;

class DummyRecipe extends Koriko
{
    function cook()
    {
        $this->task('mysql_restart', ['host' => 'localhost'], function($task) {
            $task->mysql()->stop();
            $task->mysql()->start();
        });
    }
}
