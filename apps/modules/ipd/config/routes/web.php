<?php

$namespace = 'Idy\Ipd\Controllers\Web';

$router->addGet('/', [
    'namespace' => $namespace,
    'module' => 'ipd',
    'controller' => 'ipd',
    'action' => 'index'
]);

$router->add('/ipd/admin/dosen/store',[
    'namespace' => $namespace,
    'module' => 'ipd',
    'controller' => 'admin',
    'action' => 'addDosen'
])->setName('ipd-admin-dosen-store')->via(['POST']);;

$router->add('/ipd/admin/dosen/list',[
    'namespace' => $namespace,
    'module' => 'ipd',
    'controller' => 'admin',
    'action' => 'listDosen'
])->setName('ipd-admin-dosen-list');

$router->add('/ipd/admin/dosen/edit/{id}',[
    'namespace' => $namespace,
    'module' => 'ipd',
    'controller' => 'admin',
    'action' => 'editDosen'
])->setName('ipd-admin-dosen-edit');

$router->add('/ipd/admin/dosen/update',[
    'namespace' => $namespace,
    'module' => 'ipd',
    'controller' => 'admin',
    'action' => 'updateDosen'
])->setName('ipd-admin-dosen-update')->via(['POST']);;