<?php

namespace Oridoki\DPloyBundle\Tests\DPloy;

use Oridoki\DPloyBundle\DPloy\Recipe;

class DPloyTest extends \PHPUnit_Framework_TestCase
{
    public function testMe()
    {
        $recipe = new Recipe;
        $recipe->execute();
    }
}
