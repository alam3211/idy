<?php

$namespace = 'Idy\Ipd\Controllers\Web';

$router->addGet('/', [
    'namespace' => $namespace,
    'module' => 'ipd',
    'controller' => 'ipd',
    'action' => 'index'
]);

$router->add('/ipd/admin/dosen/create',[
    'namespace' => $namespace,
    'module' => 'ipd',
    'controller' => 'admin',
    'action' => 'createDosen'
])->setName('ipd-admin-dosen-create');

$router->add('/ipd/admin/dosen/store',[
    'namespace' => $namespace,
    'module' => 'ipd',
    'controller' => 'admin',
    'action' => 'storeDosen'
])->setName('ipd-admin-dosen-store')->via(['POST']);

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
])->setName('ipd-admin-dosen-update')->via(['POST']);

$router->add('/ipd/admin/dosen/delete',[
    'namespace' => $namespace,
    'module' => 'ipd',
    'controller' => 'admin',
    'action' => 'deleteDosen'
])->setName('ipd-admin-dosen-destroy')->via(['POST']);


$router->add('/ipd/admin/matkul/create',[
    'namespace' => $namespace,
    'module' => 'ipd',
    'controller' => 'admin',
    'action' => 'createMatkul'
])->setName('ipd-admin-matkul-create');

$router->add('/ipd/admin/matkul/store',[
    'namespace' => $namespace,
    'module' => 'ipd',
    'controller' => 'admin',
    'action' => 'storeMatkul'
])->setName('ipd-admin-matkul-store')->via(['POST']);

$router->add('/ipd/admin/matkul/list',[
    'namespace' => $namespace,
    'module' => 'ipd',
    'controller' => 'admin',
    'action' => 'listMatkul'
])->setName('ipd-admin-matkul-list');

$router->add('/ipd/admin/matkul/edit/{id}',[
    'namespace' => $namespace,
    'module' => 'ipd',
    'controller' => 'admin',
    'action' => 'editMatkul'
])->setName('ipd-admin-matkul-edit');

$router->add('/ipd/admin/matkul/update',[
    'namespace' => $namespace,
    'module' => 'ipd',
    'controller' => 'admin',
    'action' => 'updateMatkul'
])->setName('ipd-admin-matkul-update')->via(['POST']);

$router->add('/ipd/admin/matkul/delete',[
    'namespace' => $namespace,
    'module' => 'ipd',
    'controller' => 'admin',
    'action' => 'deleteMatkul'
])->setName('ipd-admin-matkul-destroy')->via(['POST']);