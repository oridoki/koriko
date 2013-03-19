<?php

namespace Oridoki\KorikoBundle\Koriko;

class Koriko
{
    protected function task($task_name, $options, $block)
    {
        echo "\nTask $task_name";
        $task = new Task($task_name);

        $block($task);
    }
}

