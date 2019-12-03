<?php

$namespace = 'Idy\Ipd\Controllers\Web';

$router->addGet('/ipd', [
    'namespace' => $namespace,
    'module' => 'ipd',
    'controller' => 'ipd',
    'action' => 'index'
]);

$router->add('/ipd/store',[
    'namespace' => $namespace,
    'module' => 'ipd',
    'controller' => 'ipd',
    'action' => 'addPost'
])->setName('ipd-store')->via(['POST']);;