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

$router->add('/ipd/list',[
    'namespace' => $namespace,
    'module' => 'ipd',
    'controller' => 'ipd',
    'action' => 'list'
])->setName('ipd-list');

$router->add('/ipd/edit/{id}',[
    'namespace' => $namespace,
    'module' => 'ipd',
    'controller' => 'ipd',
    'action' => 'edit'
])->setName('ipd-edit');