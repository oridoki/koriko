<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();
$collection->add('wrap_wrap_wrap_homepage', new Route('/hello/{name}', array(
    '_controller' => 'DPloyBundle:Default:index',
)));

return $collection;
