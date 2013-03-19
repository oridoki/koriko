<?php

namespace Oridoki\DPloyBundle\DPloy;

class DPloy
{
    protected function task($task_name, $options, $block)
    {
        echo "\nTask $task_name";
        $task = new Task($task_name);

        $block($task);
    }
}

