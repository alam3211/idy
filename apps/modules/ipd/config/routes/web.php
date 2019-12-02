<?php

$namespace = 'Idy\Ipd\Controllers\Web';

$router->addGet('/ipd', [
    'namespace' => $namespace,
    'module' => 'ipd',
    'controller' => 'ipd',
    'action' => 'index'
]);
